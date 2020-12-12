<?php
 
print"
<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' href='https://unpkg.com/onsenui/css/onsenui.css'>
  <link rel='stylesheet' href='https://unpkg.com/onsenui/css/onsen-css-components.min.css'>
  <script src='https://unpkg.com/onsenui/js/onsenui.min.js'></script>
  <link rel='stylesheet' href='./css/estilo.css' type='text/css'>

  <style>
    .miItem {margin:10px;}
    .elimina {background-color:red;}
  </style>
</head>
<body>

<ons-navigator id='appNavigator' swipeable swipe-target-width='80px'>
  <ons-page>
    <ons-splitter id='appSplitter'>
      <ons-splitter-side id='sidemenu' page='sidemenu.html' swipeable side='right' collapse='' width='260px'></ons-splitter-side>
      <ons-splitter-content page='tabbar.html'></ons-splitter-content>
    </ons-splitter>
  </ons-page>
</ons-navigator>

<template id='sidemenu.html'>
   <ons-page>
    <ons-list-title>Menú</ons-list-title>
    <ons-list>
       <ons-list-item onclick='fn.loadView(0)'>Autores: Carlos Alcalá Yepes y Maria Jesús Prior Bruno</ons-list-item>
    </ons-list>
</template>

<template id='tabbar.html'>
  <ons-page id='tabbar-page'>
    <ons-toolbar>
      <div class='center'>Fruteria</div>
      <div class='right'>
        <ons-toolbar-button onclick='fn.toggleMenu()'>
          <ons-icon icon='ion-navicon, material:md-menu'></ons-icon>
        </ons-toolbar-button>
      </div>
    </ons-toolbar>

    <ons-tabbar swipeable id='appTabbar' position='auto'> 
      <ons-tab label='Productos' icon='ion-home' page='page1.html' active></ons-tab>
      <ons-tab label='Cesta' icon='ion-edit' page='page2.html'></ons-tab>
    </ons-tabbar>

  </ons-page>
</template>

<template id='page1.html'>
  <ons-page id='page1'>
   
   <ons-toolbar>
    <div class='left'>
      <ons-toolbar-button onclick='prev()'>
        <ons-icon icon='md-chevron-left'></ons-icon>
      </ons-toolbar-button>
    </div>
    <div class='center'>Productos</div>
    <div class='right'>
      <ons-toolbar-button onclick='next()'>
        <ons-icon icon='md-chevron-right'></ons-icon>
      </ons-toolbar-button>
    </div>
  </ons-toolbar>
  <ons-carousel fullscreen swipeable auto-scroll overscrollable id='carousel'>
    
  </ons-carousel>
  </ons-page>
</template>

<template id='page2.html'>
  <ons-page id='page2'>
    <ons-toolbar>
      <div class='center'>Cesta</div>
    </ons-toolbar>
    <ons-list id='cesta'>
        
    </ons-list>

    <ons-button id='botonComprar' onclick=comprarMovil() modifier='large'>Comprar</ons-button>
  </ons-page>

</template>

<script type='text/javascript' src='/javaScript/movil.js'></script>

</body>
</html>";

?>