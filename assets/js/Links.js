class Links {
    
    redirect(a, linkTo) {
        $(a).on('click', () => {
            window.location.href = linkTo
        })

        return this
    }

    reset(form) {
        $('.form-reset').on('click', e => {
            document.getElementById(form).reset()
        })
    }
}