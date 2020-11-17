function	handleFiles(e)	{
    let ctx	=	document.getElementById('canvas').getContext('2d');
    let img	=	new	Image;
    img.src	=	URL.createObjectURL(e.target.files[0]);
    img.onload	=	function()	{
                    ctx.drawImage(img,	10,10);
    }
}

function cerrar(){
    document.getElementById('ventanaImagen').style.display = 'none';
}



function abrirForm(){
    document.getElementById('ventanaImagen').style.display = 'block';
}

