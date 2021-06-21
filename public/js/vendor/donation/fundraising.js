
Vue.prototype.$http = axios

new Vue({
    el: '#main',
    data: {
        token: $('meta[name=csrf-token]').attr('content'),
        path: {
            base: $('meta[name=path]').attr('content'),
            asset: $('meta[name=asset]').attr('content'),
        },

        data: {
            list_line: {
                scroll: false,
                list: {
                    data: [],
                },
            },
        },

        validate: {
            errors: false,
            message: null,
        },
    },
    computed: {
        pathBase: function() {
            return atob(this.path.base);
        },
        pathAsset: function() {
            return atob(this.path.asset);
        },
        contextFill: function() {
            return atob(this.context);
        },
    },
    mounted() {
        self = this;

    },
    created() {
        this.listScroll();

        self = this;
        window.addEventListener('scroll', () => {
            let scroll = self.bottomVisible();
            let next_page_url = self.data.list_line.list.next_page_url;

            if (scroll) {
                if (next_page_url != '' && next_page_url != null) {
                    if (!self.data.list_line.scroll) {
                        setTimeout(function (){
                            self.listScroll(next_page_url);
                            self.data.list_line.scroll = false;
                        }, 1500);
                    }
                    self.data.list_line.scroll = true;
                }
            }
        });
    },
    methods: {
        runValidation(validation) {
            let input = $(validation);
            for (var i = 0; i < input.length; i++) {
                if (this.checkValidation(input[i]) === false) {
                    $(input[i]).addClass('invalid');
                    $(input[i]).focus();
                    return false;
                }
            }

            return true;
        },
        checkValidation(input) {
            let inputHtml = $(input);
            let nameAttr = inputHtml.attr('placeholder');

            inputHtml.removeClass('invalid');
            if (inputHtml.val().trim() === '') {
                this.addValidation(true, 'Kolom '+nameAttr+' harus diisi.');
                return false;
            } else if ($(input).attr('type') === 'email' || $(input).attr('name') === 'email') {
                if (this.validEmail(inputHtml.val()) !== true) {
                    this.addValidation(true, 'Kolom '+nameAttr+' berisi alamat email yang tidak valid.');
                    return false;
                }
            } else if ($(input).attr('type') === 'text' && $(input).attr('name') === 'name') {
                if (this.validAlpha(inputHtml.val()) !== true) {
                    this.addValidation(true, 'Kolom '+nameAttr+' berisi karakter selain huruf.');
                    return false;
                }
            }
            return true;
        },
        validEmail: function (email) {
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        validAlphaNumeric: function(value){
            // var re = /[a-zA-Z][0-9]+$/;
            // var re = /^[a-zA-Z0-9!@#\$%\^\&*\)\(+=_-]+$/;
            var re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#\$%\^\&*\)\(+=_-])[A-Za-z\d!@#\$%\^\&*\)\(+=_-]{8,}/;
            return re.test(value);
        },
        validAlpha: function(value) {
            var re = /^[a-zA-Z/\s/g]+$/;
            return re.test(value);
        },
        emptyValidation() {
            this.validate.errors = false;
            this.validate.message = null;
        },
        addValidation(show, msg) {
            this.validate.errors = show;
            this.validate.message = msg;
        },
        showMessage(message) {
            return alert(message);
        },

        showLoader() {

        },
        hideLoader() {

        },

        bottomVisible() {
            const scrollY = window.scrollY
            const visible = document.documentElement.clientHeight
            const pageHeight = document.documentElement.scrollHeight
            const bottomOfPage = visible + scrollY >= pageHeight
            return bottomOfPage || pageHeight < visible
        },
        listScroll(url= null) {
            let ListLine = this.data.list_line.list;
            this.$http.post(url ? url : this.pathBase + '/donation/list-fundraising', {
                _token: this.token,
            })
                .then(res => {
                    let Data = res.data;
                    if (Data.status == 1) {
                        if (!ListLine.data) {
                            ListLine.data = Data.item;
                        } else {
                            ListLine.data.push(...Data.item.data);
                            ListLine.next_page_url = Data.item.next_page_url;
                        }
                    }
                })
                .catch((error) => {
                    if( error.response ){
                        let Data = error.response.data;
                        if (Data.status == 0) {
                            this.showMessage(Data.message);
                        }
                    }
                });
        },
    }
})
