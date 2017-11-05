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

this.quill = new Quill('#Editor', {
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

function imageHandler() {
        var range = this.quill.getSelection();
        var value = prompt('What is the image URL');
        this.quill.insertEmbed(range.index, 'image', value, Quill.sources.USER);
}

$('#editor').on('focusout', function(event) {
        event.preventDefault();
        console.log($('#editor').html());
});