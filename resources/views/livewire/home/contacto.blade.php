<section id="contact">
    <div class="inner">
        <section>
            <form method="POST" action="{{ route('contact.send') }}">
                @csrf
                <div class="fields">
                    <div class="field half">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" style="border-radius: 5px;" />
                    </div>
                    <div class="field half">
                        <label for="email">Correo Electrónico</label>
                        <input type="text" name="email" id="email" style="border-radius: 5px;" />
                    </div>
                    <div class="field">
                        <label for="message">Mensaje</label>
                        <textarea name="message" id="message" rows="6" style="border-radius: 5px;"></textarea>
                    </div>
                </div>
                <ul class="actions">
                    <li><input type="submit" value="Enviar Mensaje" class="primary" style="border-radius: 5px;" /></li>
                    <li><input type="reset" value="Limpiar" style="border-radius: 5px;" /></li>
                </ul>
            </form>
        </section>
        <section class="split">
            <section>
                <div class="contact-method">
                    <span class="icon solid alt fa-envelope"></span>
                    <h3>Email</h3>
                    <a href="#">information@untitled.tld</a>
                </div>
            </section>
            <section>
                <div class="contact-method">
                    <span class="icon solid alt fa-phone"></span>
                    <h3>Teléfono</h3>
                    <span>(000) 000-0000 x12387</span>
                </div>
            </section>
            <section>
                <div class="contact-method">
                    <span class="icon solid alt fa-home"></span>
                    <h3>Dirección</h3>
                    <span>1234 Somewhere Roadsss #5432<br />
                    Mendoza<br />
                    Argentina</span>
                </div>
            </section>
        </section>
    </div>
</section>
