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
                @blur="handleBlur"
                @input="handleInput">
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
                default: 'https://www.zetin.cn/api/otherImg',
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
                                        document.querySelector('.uploader input').click();
                                    } else {
                                        this.quill.format('image', )
                                    }false
                                }
                            }
                        }
                    }
                },
            }
        },
        methods: {
            uploadSuccess(res, file) {
                let quill = this.$refs.Ueditor.quill;
                if (res['path'] ) {
                    let len = quill.getSelection().index
                    quill.insertEmbed(len, 'image', res['path'])
                    quill.setSelection(len + 1)
                } else {
                    console.log(res)
                    this.$Message.error('图片插入失败');
                }
            },
            uploadError(res, file) {
                this.$Message.error('图片上传出错')
                console.log(res)
            },
            handleBlur(event){
                this.$emit('blur', event)
            },
            handleInput(event) {
                this.$emit('input', event)
                this.setContent(event)
            },
            setContent(value) {
                this.content = value
            }
        },
        watch: {
            value(val) {
                this.setContent(val)
            }
        }
    }
</script>

<style scoped>

</style>