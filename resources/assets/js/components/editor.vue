<template>
    <quill-editor
            v-model="content"
            :options="option"
            ref="Ueditor"

            @focus="onEditorBlur($event)">

    </quill-editor>
</template>

<script>
    const toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],

        [{'header': 1}, {'header': 2}],               // custom button values
        [{'list': 'ordered'}, {'list': 'bullet'}],
        [{'script': 'sub'}, {'script': 'super'}],      // superscript/subscript
        [{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent
        [{'direction': 'rtl'}],                         // text direction

        [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
        [{'header': [1, 2, 3, 4, 5, 6, false]}],

        [{'color': []}, {'background': []}],          // dropdown with defaults from theme
        [{'font': []}],
        [{'align': []}],
        ['image',],
        ['clean']                                         // remove formatting button
    ]
    export default {
        data() {
            return {
                content: '测试的类容',
                option: {
                    modules: {
                        toolbar: {
                            container: toolbarOptions,
                            handlers: {
                                'image': function (value) {
                                    if (value) {
                                        alert(1)
                                    } else {
                                        this.quill.format('image', false)
                                    }
                                }
                            }
                        }
                    }
                },
            }
        },
        methods: {
            onEditorBlur() {
                console.log(this.$refs.Ueditor.quill.getSelection());
            }
        }
    }
</script>

<style scoped>

</style>