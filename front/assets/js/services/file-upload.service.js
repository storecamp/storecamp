require('../bootstrap');

function uploadAvatar(formData) {
    const url = `${window.BASE_URL}/api/file/uploadAvatar`;
    let token = document.head.querySelector('meta[name="csrf-token"]');
    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('id_token');
    return window.axios.post(url, formData)
        // get data
            .then(x => x.data);
}

function uploadResume(formData, updateInstance) {
    const url = `${window.BASE_URL}/api/file/uploadResume`;
    let token = document.head.querySelector('meta[name="csrf-token"]');
    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('id_token');
    return window.axios.post(url, formData)
    // get data
        .then(x => {
            updateInstance.showContact();
            x.data;
        });
}

export { uploadAvatar, uploadResume }