function editorTool(id, n) {
    var a = ['<span class="bold">TextHere</span>',
        '<a href="your-link.here">TextHere</a>',
        '<span class="centerline">TextHere</span>',
        '<img src="example.png" alt="mImg">'
    ];
    if(!(n<0 || n>a.length-1)){
        document.getElementById(id).value+= a[n];
    }
    
}