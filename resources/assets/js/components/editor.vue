<template>
    <div>
        <upload
                class="uploader"
                :action="serverUrl"
                name="img"
                :on-error="uploadError"
                :show-upload-list="false"
                :on-success="uploadSuccess">
        </upload>
        <quill-editor
                :value="content"
                :options="option"
                ref="Ueditor"
                @input="handleInput"
                @blur="onEditorBlur">
        </quill-editor>
    </div>
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
        props: {
            value: {
                type: String,
                default: ''
            },
            serverUrl: {
                type: String,
                default: '',
            }
        },
        data() {
            return {
                content: this.value,
                option: {
                    placeholder: '',
                    modules: {
                        toolbar: {
                            container: toolbarOptions,
                            handlers: {
                                'image': function (value) {
                                    if (value) {
                                        alert(1)
                                        document.querySelector('.ivu-upload input').click();
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
            onEditorBlur(event) {
                this.$emit('on-blur', '')
            },
            uploadSuccess(res, file) {

            },
            uploadError(res, file) {
                this.$Message.error('图片上传出错')
                console.log(res)
            },
            handleInput(event) {
                this.$emit('input', event)
            }
        }
    }
</script>

<style scoped>

</style>