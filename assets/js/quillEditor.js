/*toolbar options*/
var toolbarOptions = [
        [{ 'font': [] }],
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'align': [] }],
        [{ 'size': ['small', false, 'large', 'huge'] }],
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        [{ 'color': [] }, { 'background': [] }],
        ['code-block'],
        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        ['link', 'image', 'video'],
        ['clean']
];
/*config quill editor*/

if ($('#editor').val() !== undefined) {
var quill = new Quill('#editor', {
        modules: {
                toolbar: {
                        container: toolbarOptions,
                        handlers: {
                                image: imageHandler
                        }
                },
                imageResize:{}
        },
        theme: 'snow'
});        
};
/*handler image*/
function imageHandler() {
        var range = this.quill.getSelection();
        /*obtain url*/
        var value = prompt('What is the image URL');
        this.quill.insertEmbed(range.index, 'image', value, Quill.sources.USER);
}
/*funtion obtain list multimedia image*/

/*function handler image*/
function quillread(content = ''){
var quillOnlyRead = new Quill('#quillRead',{modules:{toolbar:false},theme: 'snow'});
quillOnlyRead.setContents(content);
quillOnlyRead.enable(false);       
}

function obtainEditor(quill = '') {
        var delta = quill.getContents();
        var quillContent = JSON.stringify(delta.ops);
        return quillContent;
}

