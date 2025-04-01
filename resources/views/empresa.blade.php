<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velas.... Luz & Aroma </title>

    <!--Este enlace carga la biblioteca Font Awesome en su versión 6.4.2, que permite usar iconos en la página web. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!--"llama a la clase style -->
    <link rel="stylesheet" href="resources/css/styles.css"/>


    <style>
            :root{
            --pink:#e84393;
        }

        *{
            margin:0; padding:0;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            outline: none; border:none;
            text-decoration: none;
            text-transform: capitalize;
            transition: .2s linear;
        }

        html{
            font-size: 62.5%;
            scroll-behavior: smooth;
            scroll-padding-top: 6rem;
            overflow-x: hidden ;
        }

        /* Aplica relleno (padding) de 2rem arriba y abajo, y 9% a los lados. */
        section{
            padding:2rem 9%;
        }
        .heading{
            text-align: center;
            font-size: 4rem;
            color:#333;
            padding:1rem;
            margin: 2rem 0;
            background: rgba(255,51,153,.05);

        }

        .heading span{
            color:var(--pink)
        }

        .btn{
            display: inline-block;
            margin-top: 1rem;
            border-radius: 5rem;
            background: #333;
            color:#fff;
            padding: .9rem 3.5rem;
            cursor:pointer;
            font-size: 1.7rem;
        }

        .btn:hover{
            background:var(--pink);
        }

        header{
            position: fixed;
            top:0; left:0; right:0;
            padding:2rem 9%;
            height: 8rem;
            background: #fff;
            display:flex;
            align-items:center;
            justify-content:space-between;
            z-index:1000;
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
        }

        section {
            padding: 10rem 9% 2rem; /* Asegura espacio superior */
        }

        header .logo{
            font-size: 3rem;
            color:#e84393;
            font-weight: bolder;
        }

        header .logo span{
            color:var(--pink);
        }



        header .navbar a{
            font-size: 2rem;
            padding:0 1.5rem;
            color: #0a0a0a;
        }

        header .navbar a:hover{
            color:var(--pink);
        }

        header .icons a{
            font-size: 1.5rem;
            color:#333;
            margin-left: 1.5rem;
        }

        header .icons a:hover{
            color:var(--pink);
        }

        /* Centra el texto debajo del video */
        header #toggler{
            display: none;
        }
        header .fa-bars{
            font-size: 3rem;
            color:#333;
            border-radius: .5rem;
            padding: .5rem 1.5rem;
            cursor: pointer;
            border: .1rem solid rgba(0,0,0,.1);
            display: none;
        }
        body {
            padding-top: 8rem; /* Ajusta según la altura del header */
        }

        .home{
            display: flex;
            align-items: center;
            min-height: 100vh;
            background:url(velaa.jpg) no-repeat;
            background-size: cover;
            background-position: center;
            width: 100%;
        }

        .home .content{
            max-width: 50rem;
        }

        .home .content h2{
            font-size: 6rem;
            color:#fff;

        }

        .home .content span{
            font-size: 1.5rem;
            color:var(--pink);
            padding: 1rem 0;
            line-height: 1.5;
        }

        .home .content span{
            font-size: 3.5rem;
            color:#999;
            padding: 1rem 0;
            line-height: 1.5;
        }

        .video-container {
            display: flex;
            flex-direction: column;
            align-items: center; /* Centra el contenido verticalmente */
            justify-content: center; /* Centra el contenido horizontalmente */
            text-align: center; /* Centra el texto debajo del video */

        }

        .video-container video {
            width: 50%; /* Ajusta el tamaño del video */
            max-width: 500px; /* Tamaño máximo */
            height: auto; /* Mantiene la proporción del video */
            border-radius: 10px; /* Opcional: Bordes redondeados */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra para mejor apariencia */

        }
        .acerca .row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem; /* Espaciado entre elementos */
            flex-wrap: wrap; /* Permite que los elementos se acomoden en pantallas pequeñas */
        }

        .acerca .row .content{
            flex: 1 1 40rem;
        }
        .acerca .row .content h3{
            font-size: 3rem;
            color: #333;
        }

        .acerca .row .content p{
            font-size: 1.5rem;
            color: #999;
            padding: 5rem 0;
            padding-top: 1rem 0;
            line-height: 1.5;
        }

        .icons-container{
            background: #eee;
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        .icons-container .icons{
            background: #fff;
            border: .1rem solid rgba(0,0,0,.1);
            padding: 2rem;
            display: flex;
            align-items: center;
            flex:1 1 25rem;
        }

        .icons-container .icons img{
            height: 3rem;
            margin-right: 2rem;
        }

        .icons-container .icons h3{
            color: #333;
            padding-bottom: .5rem;
            font-size: 1.5rem;
        }

        .icons-container .icons span{
            color: #555;
            font-size: 1.5rem;
        }

        .productos .box-container{
            display: flex;
            flex-wrap: wrap;
            gap:1.5rem;
        }

        .productos .box-container .box{
            flex:1 1 30rem;
            box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.1);
            border-radius: .5rem;
            border: .1rem solid rgba(0,0,0,.1);
            position: relative;
        }

        .productos .box-container .box .discount{
            position: absolute;
            top:1rem; left:1rem;
            padding: .7rem 1rem;
            font-size: 2rem;
            color:red;
            background: rgba(255, 51, 153,.05);
            z-index: 1;
            border-radius: .5rem;
        }

        .productos .box-container .box .image{
            position: relative;
            text-align: center;
            padding-top: 2rem;
            overflow: hidden;
        }

        .productos .box-container .box .image img{
            height: 25rem;
        }

        .productos .box-container .box:hover .image img{
            transform: scale(1.1);
        }

        .productos .box-container .box .image .icons{
            position: absolute;
            bottom: -7rem; left: 0; right: 0;
            display:flex;
        }

        .productos .box-container .box:hover .image .icons{
            bottom: 0;
        }

        .productos .box-container .box .image .icons a{
            height: 5rem;
            line-height: 5rem;
            font-size: 2rem;
            width: 50%;
            background:var(--pink);
            color: #fff;
        }

        .productos .box-container .box:hover .image .icons .cart-btn{
            border-left: .1rem solid #fff7;
            border-right: .1rem solid #fff7;
            width: 100%;
        }

        .productos .box-container .box .image .icons a:hover{
            background: #333;
        }

        .productos .box-container .box .content{
            padding: 2rem;
            text-align: center;
        }

        .productos .box-container .box .content h3{
            font-size: 2.5rem;
            color:#333;
        }

        .productos .box-container .box .content .price{
            font-size: 2.5rem;
            color:var(--pink);
            font-weight: bolder;
            padding-top: 1rem;
        }

        .productos .box-container .box .content .price span{
            font-size: 1.5rem;
            color:#999;
            font-weight: lighter;
            text-decoration: line-through;
        }

        .reseña .box-cantainer{
            display: flex;
            flex-wrap: wrap;
            gap:1.5rem;
        }

        .reseña .box-cantainer .box{
            flex:1 1 10rem;
            box-shadow:0 .5rem rgba(0,0,0,.1);
            border-radius: .5rem;
            padding: 3rem 2rem;
            position: relative;
        }

        .reseña .box-cantainer .box .fa-quote-right{
            position: absolute;
            bottom: 3rem; right: 3rem;
            font-size: 6rem;
            color:#eee
        }

        .reseña .box-cantainer .box .stars i{
            color:var(--pink);
            font-size: 2rem;
        }

        .reseña .box-cantainer .box p{
            color:#999;
            font-size: 1.5rem;
            line-height: 1.5;
            padding-top: 2rem;
        }

        .reseña .box-cantainer .box .user{
            display: flex;
            align-items: center;
            padding-top: 2rem;
        }

        .reseña .box-cantainer .box .user img{
            height: 6rem;
            width: 6rem;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 1rem;
        }

        .reseña .box-cantainer .box .user h3{
            font-size: 2rem;
            color: #333;
        }

        .reseña .box-cantainer .box .user h3{
            font-size: 1.5rem;
            color: #999;
        }













        /* media queries */
        @media(max-width:991px){
            html{
                font-size: 55%;
            }

            header{
                padding: 2rem;
            }

            section{
                padding: 2rem;
            }

            .home{
                background-position: left;
            }
        }

        @media(max-width:768px){

            header .fa-bars{
                display: block;
            }

            header .navbar{
                position: absolute;
                top:100%; left:0; right: 0;
                background: #eee;
                border-top: .1rem solid rgba(0,0,0,.1);
                clip-path: polygon(0 0, 100% 0, 0 0);
            }

            header #toggler:checked ~ .navbar{
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);

            }
            header .navbar a{
                margin: 1.5rem;
                padding: 1.5rem;
                background: #fff;
                border: .1rem solid rgba(0,0,0,.1);
                display: block;
            }

            .home .content h3{
                font-size: 5rem;
            }

            .home .content span{
                font-size: 2.5rem;
            }

            .icons-container .icons h3{
                font-size: 2rem;
            }

            .icons-container .icons span{
                font-size: 1.7rem;
            }


        }


        @media(max-width:450px){
            html{
                font-size: 50%;
            }

            .heading{
                font-size: 3rem;
            }
        }


            </style>

        </head>
        <body>

<!-- href:indica la dirección del recurso al que se quiere acceder -->
<header>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="#" class="logo"> Luz & Aroma <span> </span></a>

    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#acerca">Acerca de... </a>
        <a href="#productos">Productos</a>
        <a href="#reseña">Reseña</a>
        <a href="#contact">Contacto</a>
    </nav>

    <div class="icons">
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-shopping-cart"></a>
        <a href="#" class="fas fa-user"></a>
        <a href="{{ route('vela') }}" class="fas fa-chart-line"></a>
    </div>
</header>

<!-- header section ends-->
<!-- home section starts-->
<section class="home" id="home">

    <div class="content">
        <h2>Luz & Aroma</h2>
        <span>Ambiente agradable y relajante en sus hogares </span>
        <p>Empresa dedicada a hacer velas aromáticas hechas a mano. Estas velas están hechas con cera natural y aceites que dan buenos olores</p>
        <a href="#" class="btn">Comprar ahora</a>
    </div>
</section>

<!-- home section ends-->

<!-- about section starts-->
 <section class="acerca" id="acerca">
    <h1 class="heading"><span>Acerca De...</span></h1>
    <div class="row">

        <div class="video-container">
            <video src="videove.mp4"loop autoplay muted></video>

        </div>

        <div class="content">
            <h3>¿Por qué elegirnos?</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus voluptatem quibusdam, eos, pariatur ipsa laboriosam quo illum impedit tempore officia voluptatibus aut corrupti officiis tempora commodi iusto molestiae itaque optio!</p>
            <a href="#" class="btn">Aprender más</a>
        </div>
    </div>
 </section>
<!-- about section ends-->

<!-- icons section starts-->
 <section class="icons-container">

    <div class="icons">
        <img src="Ipedido.png" alt="">
        <div class="info">
            <h3>Envios</h3>
        </div>
    </div>

    <div class="icons">
        <img src="Idinero.png" alt="">
        <div class="info">
            <h3>Devoluciones</h3>
        </div>
    </div>

    <div class="icons">
        <img src="Iofertas.png" alt="">
        <div class="info">
            <h3>Ofertas</h3>
        </div>
    </div>

    <div class="icons">
        <img src="Ipago.png" alt="">
        <div class="info">
            <h3>Pagos</h3>
        </div>
    </div>

 </section>
<!-- icons section ends-->

<!-- productos section starts-->
<section class="productos" id="productos">
    <h1 class="heading">Velas  <span>Aromáticas</span> </h1>
    <div class="box-container">

        <div class="box">
            <span class="discount">-5%</span>
            <div class="image">
                <img src="Vela1.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="cart-btn">Añadir</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Vela 1</h3>
                <div class="price">$72<span>$120</span></div>
            </div>
        </div>

        <div class="box">

            <div class="image">
                <img src="/Vela2.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="cart-btn">Añadir</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Vela 2</h3>
                <div class="price">$200</div>
            </div>
        </div>

        <div class="box">

            <div class="image">
                <img src="Vela3.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="cart-btn">Añadir</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Vela 3</h3>
                <div class="price">$250</div>
            </div>
        </div>

        <div class="box">

            <div class="image">
                <img src="Vela4.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="cart-btn">Añadir</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Vela 4</h3>
                <div class="price">$150</div>
            </div>
        </div>

        <div class="box">

            <div class="image">
                <img src="Vela5.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="cart-btn">Añadir</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Vela 5</h3>
                <div class="price">$230</div>
            </div>
        </div>

        <div class="box">
            <span class="discount">-10%</span>
            <div class="image">
                <img src="Vela6.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="cart-btn">Añadir</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Vela 6</h3>
                <div class="price">$154<span>$240</span></div>
            </div>
        </div>

        <div class="box">

            <div class="image">
                <img src="Vela7.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="cart-btn">Añadir</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Vela 7</h3>
                <div class="price">$280</div>
            </div>
        </div>

        <div class="box">
            <span class="discount">-10%</span>
            <div class="image">
                <img src="Vela8.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="cart-btn">Añadir</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Vela 8</h3>
                <div class="price">$179<span>$310</span></div>
            </div>
        </div>

        <div class="box">

            <div class="image">
                <img src="Vela9.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="cart-btn">Añadir</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Vela 9</h3>
                <div class="price">$300</div>
            </div>
        </div>

        <div class="box">

            <div class="image">
                <img src="Vela10.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="cart-btn">Añadir</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Vela 10</h3>
                <div class="price">$300</div>
            </div>
        </div>

        <div class="box">
            <span class="discount">-10%</span>
            <div class="image">
                <img src="Vela11.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="cart-btn">Añadir</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Vela 11</h3>
                <div class="price">$270<span>$164</span></div>
            </div>
        </div>

        <div class="box">

            <div class="image">
                <img src="Vela12.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="cart-btn">Añadir</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Vela 12</h3>
                <div class="price">$180</div>
            </div>
        </div>

    </div>
</section>
<!-- productos section ends-->

<!-- reseña section starts-->
 <section class="reseña" id="reseña">
    <h1 class="heading">Reseña <span>del Cliente</span></h1>

    <div class="box-cantainer">

        <div class="box">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum provident debitis dicta error aspernatur assumenda perferendis culpa consequuntur quis consectetur consequatur laudantium illo obcaecati, labore vel pariatur corporis accusamus sit!</p>
            <div class="user">
                <img src="sabino.jpg" alt="">
                <div class="user-info">
                    <h3>Pablo Castañeda</h3>
                    <span>Cliente satisfecho</span->
                </div>
            </div>
            <span class="fas fa-quote-right"></span>

        </div>

    </div>
 </section>
<!-- reseña section ends-->




</body>
</html>
