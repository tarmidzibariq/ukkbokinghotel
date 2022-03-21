<style>
    *{
    font-family: 'Roboto', sans-serif;
}
/* head */
header{
    background-image: url('{{ asset('image/head-1.1.jpg') }}');
    background-size: cover;
    background-repeat: no-repeat;
    /* height: 550px; */
    padding: 170px 0 120px;
    /* filter: brightness(80%) */
}

header .content h2{
    font-family: 'Noto Serif',
    serif;
    font-size: 36px;
}
header .content h1{
    font-family: 'Lobster',
    cursive;
    font-size: 40px;
}
header .content p {
    font-size: 13px;
}
header .content a {
    font-size: 25px;
    /* margin-top: 50px; */
}

.animate__animated.animate__slideOutDown {
    --animate-duration: 4s;
}
@media (min-width: 768px) {
    header{
        /* background-position-y: -180px; */
        padding: 160px 0 130px;
    }
    header .content h2{
        font-size: 50px;
    }
    header .content h1{
        font-size: 60px;
    }
    header .content p{
        font-size: 16px;
    }
    header .content a {
        font-size: 35px;

    }
}
@media (min-width: 992px) {
    header {
        /* background-position-y: -80px; */
        padding: 200px 0 140px;
    }
    header .content h2 {
        font-size: 60px;
    }
    header .content h1 {
        font-size: 80px;
    }
    header .content p {
        font-size: 18px;
    }
}
/* navbar */
nav .navbar-brand{
    font-family: 'Lobster',
    cursive;
    font-size: 40px;
    color: #fb387e !important;
}
nav .navbar-nav .nav-link{
    border-bottom: 1px solid rgb(156, 156, 156);
    text-align: center;
}
nav .button {
    border: none;
    background-color: #051334;
    padding: 9px;
    font-weight: 500;
    transition: 0.5s;
}

nav .button:hover {
    background-color: #0b2a74;
}
@media (min-width: 992px) {
    nav .navbar-nav .nav-link {
        border-bottom: none;
    }
}
/* check */
@media (min-width: 992px) { 
    #check{
        padding: 50px;
    }
    #check .button{
        border: none;
        background-color: #051334;
        padding: 9px;
        font-weight: 500;
        transition: 0.5s;
    }
    #check label{
    font-weight: 400;
        font-size: 16px !important;
        color: #8a8b8d;
    }   
}


#check label{
    font-weight: 400;
    font-size: 12px;
    color: #8a8b8d;
}   
#check .button{
    border: none;
    background-color: #051334;
    padding: 5px;
    font-weight: 500;
    transition: 0.5s;
}
#check .button:hover{
    background-color: #0b2a74;
}
#check input[type=number] {

    color: #fb387e;
    transition: 0.5s;
}

#check input[type="number"]:before {
    color: #fb387e;
    content: attr(placeholder) !important;
}

#check input[type="number"]:focus {
    color: #fb387e;
    box-shadow: none;
    border-color: #CB968E !important;
}
#check input[type="number"]:hover {
    border-color: #CB968E !important;
}

#check input[type=date] {
    color: #fb387e;
    transition: 0.5s;
}

#check input[type="date"]:before {
    color: #fb387e;
    content: attr(placeholder) !important;
    margin-right: 0.5em;
}

#check input[type="date"]:focus {
    color: #fb387e;
    box-shadow: none;
    border-color: #CB968E !important;
}
#check input[type="date"]:hover {
    border-color: #CB968E !important;
}
/* about */
#about{
    padding: 50px;
}
#about h1{
    font-family: 'Noto Serif',
    serif;
    color: #051334;
    /* font-size: 36px; */
}
#about p{
    font-size: 13px;
    color: #777;
}
#about .content{
    position: relative;
}
#about img{
    width: 80%;
    transition: 0.5s;
}
#about .text{
    color: white;
    font-size: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
}
#about .overlay{
    position: absolute;
    top: 0;
    bottom: 0;
    left: 10%;
    right: 0;
    height: 100%;
    width: 80%;
    opacity: 0;
    transition: .5s ease;
    background-color: #000000;
    /* opacity: 0.5; */
}
#about .content:hover .overlay {
    /* background-color: black; */
    opacity: 0.5;
}
@media (min-width: 768px) {
    #about p {
        font-size: 16px;
    }
}
@media (min-width: 992px) {
    #about p {
        font-size: 18px;
    }
}
/* reservasi */
#reservasi{
    padding: 50px;
    background-image: url('{{ asset('image/head-4.1.jpg') }}');
    background-size: cover;
    background-attachment: fixed;
    color: #fb387e;
}
#reservasi h1{
    font-family: 'Noto Serif',
    serif;
    /* color: #051334; */
}
#reservasi label{
    font-weight: 500;
    color: #ffffff;
}
#reservasi input{
    background: #f1f1f1;
    transition: 0.5s;
}
#reservasi input:hover{
    border-color: #CB968E !important;
}
#reservasi input:focus{
    box-shadow: none;
    border-color: #CB968E !important;
}
#reservasi .button {
    border: none;
    background-color: #051334;
    padding: 9px;
    font-weight: 500;
    transition: 0.5s;
}

#reservasi .button:hover {
    background-color: #0b2a74;
}
/* product */
#product{
    padding: 50px;
}
#product h1 {
    font-family: 'Noto Serif',
        serif;
    color: #051334;
    /* font-size: 20px !important; */
}

#product p {
    font-size: 13px;
    color: #777;
}
#product .card img{
    height: auto;
}
#product .card .button {
    border: none;
    background-color: #051334;
    padding: 9px;
    font-weight: 500;
    transition: 0.5s;
    color: #fff;
}

#product .card .button:hover {
    background-color: #0b2a74;
}
@media (min-width: 768px) {
    #product p {
        font-size: 16px;
    }
}

@media (min-width: 992px) {
    #product p {
        font-size: 18px;
    }
}
/* footer */
footer{
    background-color: #fb387e;
    /* padding: 10px 0; */
}

.animate-bounch{
    transform: translateY(0px);
    animation: bounch 2.5s linear infinite;
    transition: 3.6s linear;
}

.on{
    transform: translateY(30px);
    transition: 3.6s linear;
}

@keyframes bounch {
    0%{

    }
    50%{
        transform: translateY(30px);
    }
    100%{
        transform: translateY(0px);
    }
}

/* login */
header .content .card{
    padding: 15px;
    border-radius: 10px;
}
header .content .card .card-title h3{
    color: #CB968E;
    font-family: 'Noto Serif',
    serif;
    font-size: 20px;

}
header .content .card .form-login input{
    border-radius: 5px;
    color: #CB968E;
    /* border: black; */
}
header .content .card .form-login input:hover {
    border-color: #CB968E;
    /* outline: none; */
}
header .content .card .form-login input:hover::placeholder {
    /* border-color: #CB968E !important; */
    color: #CB968E;
}
header .content .card .form-login input:focus {
    box-shadow: none;
    border-color: #CB968E;
}
header .content .card .card-title p{
    color: #7D7D7D;
    font-size: 14px;
    font-weight: 400;

}
header .content .card .choice a{
    font-size: 14px;
    color: #7D7D7D;
    font-weight: 300;
    text-decoration: none;
}
header .content .card .choice button{
    padding: 10px 30px;
    border-radius: 25px;
    font-weight: 400;
    background-color: #051334;
    outline: none;
    border: none;
    color: white;
    font-size: 20px;
    margin-left: auto;
    transition: 0.5s;
}
header .content .card .choice button:hover {
    
    background-color: #0b2a74;
    
}
@media (min-width: 992px) {
    header .content .card {
        width: 65%;
    }
}
.btn-circle{
    border-radius:100%;
    height:2.5rem;
    width:2.5rem;
    font-size:1rem;
    display:inline-flex;
    align-items:center;
    justify-content:center
}


/* forminput */
@media (min-width: 992px) { 
    #forminput{
        padding-top: 50px;
    }
    #forminput .button{
        border: none;
        background-color: #051334;
        padding: 9px;
        font-weight: 500;
        transition: 0.5s;
    }
    #forminput label{
    font-weight: 400;
        font-size: 16px !important;
        color: #8a8b8d;
    }   
}


#forminput label{
    font-weight: 400;
    font-size: 12px;
    color: #8a8b8d;
}   
#forminput .button{
    border: none;
    background-color: #051334;
    padding: 5px;
    font-weight: 500;
    transition: 0.5s;
}
#forminput .button:hover{
    background-color: #0b2a74;
}
#forminput input[type=number] {

    color: #fb387e;
    transition: 0.5s;
}

#forminput input[type="number"]:before {
    color: #fb387e;
    content: attr(placeholder) !important;
}

#forminput input[type="number"]:focus {
    color: #fb387e;
    box-shadow: none;
    border-color: #CB968E !important;
}
#forminput input[type="number"]:hover {
    border-color: #CB968E !important;
}

#forminput input[type=date] {
    color: #fb387e;
    transition: 0.5s;
}

#forminput input[type="date"]:before {
    color: #fb387e;
    content: attr(placeholder) !important;
    margin-right: 0.5em;
}

#forminput input[type="date"]:focus {
    color: #fb387e;
    box-shadow: none;
    border-color: #CB968E !important;
}
#forminput input[type="date"]:hover {
    border-color: #CB968E !important;
}

/* hotels */
#hotels .list-room{
    height: auto;
    /* background-color: black; */
}
#hotels .list-room img{
    width: 100%;
}
#hotels .list-room p{
    font-size: 12px;
}
#hotels .list-room h4{
    font-size: 16px;
}

#hotels .inputgrup .quantity-field{
    width: 60px;
}
@media (min-width: 768px) { 
    #hotels .inputgrup .quantity-field{
        width: 60px;
    }
}
@media (min-width: 992px) { 
    #hotels .inputgrup .quantity-field{
        width: 65px;    
    }
    #hotels .inputgrup .button-minus{
        height:2.5rem;
        width:2.5rem;
    }
    #hotels .inputgrup .button-plus{
        height:2.5rem;
        width:2.5rem;
    }
    #hotels .list-room p{
        font-size: 14px;
    }
    #hotels .list-room h4{
        font-size: 20px;
    }
 }
 @media (min-width: 1200px) {
    #hotels .inputgrup .quantity-field{
        width: 80px;
    }
    #hotels .list-room h4{
        font-size: 24px;
    }
  }

  /* form-reservasi */
  #form-reservasi{
      
  }

</style>