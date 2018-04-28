class App {

    constructor() {
        // Get the current url
        this.url = window.origin
        // Initialise the global script
        this.init()
    }

    init() {
        const { getPathname, url } = this

        if ( getPathname(/login/) ) new Login(url)
        else if ( getPathname(/dashboard/) ) new Dashboard(url)
        else if ( getPathname(/createFolder/) ) new CreateFolder(url)
        else if ( getPathname(/validateFolder/) ) new ValidateFolder(url)
    }

    /**
     * We check the global pathname of our current page to execute some specifics actions
     * @param pathSearch is a regex
     * @return array|null
     */
    getPathname(pathSearch) {
        const pathname = window.location.pathname
        return pathname.match(pathSearch)
    }
}

new App()