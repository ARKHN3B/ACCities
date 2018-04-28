class Autocomplete {

    /**
     * Constructor
     * @param selector
     * @param readonly
     * @param data
     * @param search
     * @param settings
     */
    constructor(selector, readonly, data, search, settings = {}) {
        this.selector = $(selector)
        this.readonly = $(readonly)
        this.data = data
        this.search = search ? search : ''

        this.default = {
            max : 4
        }

        this.settings = $.extend({}, this.default, settings)

        this.autocomplete()
    }

    /**
     * Autocomplete function
     */
    autocomplete() {

        const { selector, data, settings, search } = this
        const { max } = settings

        $(document).mouseup(e => {
            if ( $('#autocomplete-container').length ) {
                const target = $(e.target)

                if ( !target.is( $('#autocomplete-container').children() ) && !target.is(selector) ) $('#autocomplete-container').remove()
            }
        })

        // When the input is focus
        selector.focus( e => {
            // If the input is already fills
            this.start(selector, data, max, search)
        })

        // Function load when a key is press up, to get the last key press
        selector.keyup(e => {
            this.start(selector, data, max, search)
        })
    }

    /**
     * Function which start the script
     * @param selector
     * @param data
     * @param max
     * @param search
     */
    start(selector, data, max, search) {
        // If autocomplete container is already display
        if ( $('#autocomplete-container').length ) $('#autocomplete-container').remove()

        // Get the value of our input focus
        const value = selector.val()

        // If nothing is enter in our input, return
        if (!value) return

        // Set an empty array which contains our datas to give at our function which generate our list
        let array = []

        // Set a counter to display a certain number of elements on our list
        let count = 0

        // Map the entire object
        data.map((obj, pos) => {
            // If the number max is reached
            if (count === max) return

            const sch = obj[search]

            // Confront ville_code_postal and the value of our input
            if ( sch.substr(0, value.length).toLowerCase() === value.toLowerCase() ) {
                count += 1
                array.push(sch)
            }
        })

        // Function which generates our list display
        this.generateList(selector, array)
    }

    /**
     * Function which creates the css for our list
     * @param input
     */
    cssManager(input) {
        const offset = input.offset()
        const width = input.width()
        const height = input.height()

        const top = offset.top + height

        input.css({
            'box-shadow' : 'none'
        })
        $('#autocomplete-child').css({
            'position' : 'absolute',
            'top' : top,
            'left' : offset.left,
            'z-index' : '3333',
            'width' : width,
            'height' : 'auto'
        })
    }

    /**
     * Function which manages the event on click
     * @param input
     */
    listManager(input) {
        $('.autocomplete-child').on('click', e => {
            e.preventDefault()

            const text = $(e.target).text()

            input.val(text)

            console.log(text)

            $('#autocomplete-container').remove()

            this.generateReadOnly(input, text, this.readonly, this.data)
        })
    }

    /**
     * Function which generates the html tags for our list, and start his CSS and Events
     * @param input
     * @param array
     */
    generateList(input, array) {
        let div = '<div id="autocomplete-container" class="list-group">'
        for (const element of array) {
            div += ` <a href="#" class="autocomplete-child list-group-item list-group-item-action">${element}</a>`
        }
        div += '</div>'

        // Insert our element div - actually which is our list - after the input
        input.after(div)

        // Start the css management
        this.cssManager(input)
        // Start the events management
        this.listManager(input)
    }

    // TODO : if the postal Code have multiple cities

    /**
     * Function which generate the text inside our input readonly
     * @param input
     * @param text
     * @param town
     * @param object
     */
    generateReadOnly(input, text, town, object) {
        // Define a var which returns a bool if the postal code is find or not
        let find = false

        // If the postal code is minor of five, returns false
        if (text.length < 5) return find

        // We set a loop to our fetching data
        for (const obj of object) {

            const { ville_code_postal, ville_nom } = obj

            // We fix some conditions to pass when the first, second or third character isn't equal to the same in
            // our input text
            if ( ville_code_postal.substr(0, 1) !== text.substr(0, 1) ) continue
            if ( ville_code_postal.substr(0, 2) !== text.substr(0, 2) ) continue

            // If our city has more than one postalCode
            if ( ville_code_postal.length > 5 ) {

                // Split a string like that : 66000-66100 into an array like that : ['66000','66100']
                const array = ville_code_postal.split('-')

                for (const element of array) {
                    find = this.checkPostalCode(element, town, text, ville_nom)
                    if (find) return find
                }
            }

            if ( ville_code_postal.substr(0, 3) !== text.substr(0, 3) ) continue

            find = this.checkPostalCode(ville_code_postal, town, text, ville_nom)
            if (find) return find
        }

        return find
    }

    /**
     * Function which check if the postalCode exist
     * @param postalCode
     * @param town
     * @param value
     * @param name
     * @returns {boolean}
     */
    checkPostalCode(postalCode, town, value, name) {
        if (postalCode === value) {
            town.val(name)
            return true
        }
    }
}