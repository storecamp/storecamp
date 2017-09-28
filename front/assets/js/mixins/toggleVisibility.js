function toggleVisibility(event) {
    event.preventDefault();
    let _this = this;
    Vue.http.post(
        'api/profile/toggleVisibility',
        {}
    ).then(response => {
        this.error = false;
        this.visible = response.body.visible;
        _this.eventHub.$emit('user:visibility', { visible: response.body.visible });
    }, response => {
        this.error = true
        this.errorMsg = response.error
    })
}

export { toggleVisibility }
