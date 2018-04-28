class Login {

    constructor(url) {
        this.url = url

        this.init()
    }

    init() {
        const { removeMessageError } = this
        removeMessageError()
    }

    /**
     * Remove message error which appears on the login page,
     * when the user focus on input element.
     */
    removeMessageError() {
        $('input').focus(e => {
            window.setTimeout(() => {
                $('#error-display-p').fadeOut('slow')
            }, 500)
        })
    }

    fetchDatatable() {

    }
}