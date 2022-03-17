<script>
const arw = document.querySelector('#arw');
const turun = document.querySelector('#turun');

arw.addEventListener('mouseenter', (e) => {
    turun.classList.remove('animate-bounch');
    turun.classList.add('on');
});

arw.addEventListener('mouseleave', (e) => {
   turun.classList.remove('on');
    turun.classList.add('animate-bounch'); 
    // turun.style.transform = 'translateY(30px)';
});

</script>