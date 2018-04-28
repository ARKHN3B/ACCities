class ValidateFolder {

    constructor(url) {
        this.url = url

        this.init()
    }

    init() {
        const { backToDashboard, url } = this

        backToDashboard(url)
    }


    backToDashboard(url) {
        const links = new Links()
        const { redirect } = links

        redirect('#btn-backtodashboard', `${url}/dashboard`)
    }
}