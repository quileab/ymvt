<section id="contacts" class="w-full bg-green-700 text-white px-10 py-4">
    <h2 class="text-3xl mb-6 font-bold">Contactos</h2>
    <?php $svgClass="w-10 h-10 mr-1 text-white"; ?>
    <div class="grid md:grid-cols-5 gap-2 grid-cols-1">
        <div id="social" class="border-r-2">
            <a class="flex p-1 hover:text-yellow-100 hover:bg-green-600 rounded transition-all transition-duration: 300ms"
                href="https://www.facebook.com/profile.php?id=100090200229296&mibextid=ZbWKwL" target="_blank">
                <?php include"./images/social/icons8-facebook.svg"; ?> facebook
            </a>
            <a class="flex p-1 hover:text-yellow-100 hover:bg-green-600 rounded transition-all transition-duration: 300ms"
                href="https://instagram.com/yerbamateviajesyturismo?igshid=NzZlODBkYWE4Ng==" target="_blank">
                <?php include"./images/social/icons8-instagram.svg"; ?> instagram
            </a>
            <a class="flex p-1 hover:text-yellow-100 hover:bg-green-600 rounded transition-all transition-duration: 300ms"
                href="https://www.tiktok.com/@yerbamateviajesyturismo?_t=8gtRIijsjqP&_r=1" target="_blank">
                <?php include"./images/social/icons8-tik-tok.svg"; ?> tiktok
            </a>
        </div>
        <!-- PERSONAL CONTACT -->
        <div id="personal" class="border-r-2 md:col-span-2">
            <a class="flex flex-wrap p-1 hover:text-yellow-100 hover:bg-green-600 rounded transition-all transition-duration: 300ms"
                href="https://wa.me/5493764526072" target="_blank">
                <?php include"./images/social/icons8-whatsapp.svg"; ?> +54 9 3764 526072
            </a>
            <a class="flex flex-wrap p-1 hover:text-yellow-100 hover:bg-green-600 rounded transition-all transition-duration: 300ms"
                href="tel:+5493764526072" target="_blank">
                <?php include"./images/social/icons8-phone.svg"; ?> +54 9 3764 526072
            </a>
            <a class="flex flex-wrap p-1 hover:text-yellow-100 hover:bg-green-600 rounded transition-all transition-duration: 300ms"
                href="mailto:adm@yerbamateviajesyturismo.com" target="_blank">
                <?php include"./images/social/email-svgrepo-com.svg"; ?> adm@yerbamateviajesyturismo.com
            </a>
            <a class="flex flex-wrap p-1 hover:text-yellow-100 hover:bg-green-600 rounded transition-all transition-duration: 300ms"
                href="mailto:info@yerbamateviajesyturismo.com" target="_blank">
                <?php include"./images/social/email-svgrepo-com.svg"; ?> info@yerbamateviajesyturismo.com
            </a>
            <button data-filename="reclamos-sugerencias.html"
                class="openDialog flex w-full hover:bg-green-600 text-gray-100 font-semibold hover:text-white py-2 px-1 rounded">
                <?php include"./images/svg/chat-circle-dots.svg"; ?><span class="pt-2 mr-1">RECLAMOS o
                    SUGERENCIAS</span>
            </button>
        </div>
        <!-- CONTACT FORM -->
        <div id="contact-form" class="md:col-span-2 mx-2">
            <p class="font-bold text-lg">Consultas</p>
            <form action="/" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control w-full rounded px-3 py-2 text-gray-900" id="apellido-nombre"
                        name="apellido-nombre" placeholder="Tu nombre completo">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control w-full rounded px-3 py-2 text-gray-900" id="email"
                        name="email" placeholder="Tu correo electrónico">
                </div>
                <div class="mb-1">
                    <textarea class="form-control w-full rounded px-2 py-1 text-gray-900" id="consulta" name="consulta"
                        placeholder="Tu consulta"></textarea>
                </div>
                <button type="submit"
                    class="btn w-full text-base md:text-xs bg-green-800 hover:bg-green-600 text-gray-100 hover:font-bold py-2 px-4 rounded">
                    ENVIAR</button>
            </form>
        </div>
    </div>
</section>