class Dashboard {

    constructor (url) {
        this.url = url

        this.init()
    }

    init() {
        const { redirectManager } = this

        redirectManager(this)
        this.configDatatables()
    }

    redirectManager(context) {
        const { url } = context
        const links = new Links()
        const { redirect } = links

        redirect('#redirect-create-folder', `${url}/createFolder`)
    }

    configDatatables() {
        $('#status-table').DataTable()
        $('#status-table_filter > label > input').css({
            'box-shadow' : 'none'
        })
    }
}