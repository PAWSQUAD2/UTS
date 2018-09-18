function editorTool(id, n) {
    var a = ['<span class="bold">TextHere</span>',
        '<a href="your-link.here">TextHere</a>',
        '<span class="centerline">TextHere</span>',
        '<img src="example.png" alt="mImg">',
        '<p>Your Text Here</p>'
    ];
    if(!(n<0 || n>a.length-1)){
        document.getElementById(id).value+= a[n];
    }
    
}
function preview(){
    document.getElementById("preview-container").style.display = "block";
    document.getElementById("preview-judul").innerHTML = document.getElementById("judul").value;
    document.getElementById("preview-kategori").innerHTML ="Kategori : " + document.getElementById("kategori").value;
    document.getElementById("preview-isi").innerHTML = document.getElementById("editor").value;
}