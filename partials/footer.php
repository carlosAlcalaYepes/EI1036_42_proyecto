<footer>
	<p>
	<img src="https://licensebuttons.net/l/by-sa/3.0/88x31.png" height="31px" /><br/>
	<time datetime="2018-09-18">2018</time>.</p>
	</p>
	<address>
		<p class="izq"> Written by
			<a href="al361981@uji.es" rev="author">Maria Jesús Prior Bruno y Carlos Alcalá Yepes</a>.</p>
		<p class="der"> Visit us at:12006 UJI </p>
	</address>
</footer>
<script>
    fetch('/datos.php')
    .then(response => {
        if (response.ok)
            return response.json()
        else
            throw response.statusText
    })
	.then(data=>{data.forEach(x => visor(x)); 
				data.forEach(x => insertarOpciones(x))})
</script>

</body>

</html>