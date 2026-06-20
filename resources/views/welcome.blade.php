<h1>Mak Len Cake & Cookies 🍰</h1>

@foreach($products as $p)
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
        <h3>{{ $p->name }}</h3>
        <p>{{ $p->description }}</p>
        <p>Rp {{ number_format($p->price) }}</p>

        <a href="https://wa.me/628XXXXXXXXXX?text=Saya%20ingin%20pesan%20{{ $p->name }}">
            Pesan via WhatsApp
        </a>
    </div>
@endforeach