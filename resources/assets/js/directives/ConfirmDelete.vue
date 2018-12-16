<script>
    export default {
        bind: function (el, binding, vnode) {
            el.handleClick = (event) => {
                event.preventDefault();

                let confirmCallback = function () {
                };

                if (el.getAttribute('href')) {
                    let href = el.getAttribute('href');

                    confirmCallback = function () {
                        window.location.href = href.toString();
                    }
                }
                else if (el.getAttribute('type') === 'submit') {
                    let form = el.closest('form');

                    confirmCallback = function () {
                        form.submit();
                    }
                }

                if (confirm('Are you sure?')) {
                    confirmCallback()
                }
            };

            el.addEventListener('click', el.handleClick);
        },
        unbind(el) {
            el.removeEventListener('click', el.handleClick);
        }
    }
</script>
