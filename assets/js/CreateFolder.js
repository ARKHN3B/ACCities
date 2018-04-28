class CreateFolder {

    constructor(url) {
        this.url = url

        this.init()
    }

    init() {
        const { url, fetchCities, resetForm } = this
        fetchCities(url, this)
        resetForm()
    }

    /**
     *
     * @param url
     * @param context
     */
    fetchCities(url, context) {
        const headers = new Headers({
            'Content-type' : 'application/json'
        })
        const initializer = {
            method: 'GET',
            headers
        }

        fetch(`${url}/cities`, initializer)
            .then(response => {
                return response.json()
            })
            .then(object => {
                new Autocomplete('#postalCode', '#town', object, 'ville_code_postal')
            })
            .catch(err => {
                console.log(err)
            })
    }

    resetForm() {
        const links = new Links()
        const { reset } = links

        reset('form-create-folder')
    }
}
