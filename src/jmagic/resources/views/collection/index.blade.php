<x-layout title="JMagic - My Collection">
    <h2 role="heading" aria-level="2">My Collection</h2>

    <details>
        <summary>Add collection with file</summary>
        <form action="/collection/store" method="POST" enctype="multipart/form-data">
            <x-form.file id="batch" />
            <x-form.submit />
        </form>
    </details>

    <details>
        <summary>Add card</summary>
        <form action="/collection/store" method="POST">
            <x-form.datalist id="name" :options="$cardNames" />
            <x-form.datalist id="set" :options="$setNames" />
            <x-form.input id="cn" label="Collector Number" onkeyup="loadName()"/>
            <x-form.select id="condition" :options="$conditions" required />
            <x-form.select id="finish" :options="$treatments" required />
            <x-form.select id="lang" :options="$languages" required />
            <x-form.textarea id="notes" />
            <x-form.number id="quantity" value="1"/>
            <x-form.number id="purchase" step="0.01" value="0.00" />
            <x-form.checkbox id="alter" />
            <x-form.checkbox id="proxy" />
            <x-form.select id="binder" :options="$binders"/>
            <x-form.select id="deck" :options="$decks"/>
            <x-form.submit />
        </form>
    </details>

    <details>
        <summary>View Collection</summary>
        @foreach ($cards as $card)

            @if ($view == 'img')
                <img src="{{ $card['image_uris']['small'] }}">
            @else
                <p>{{ $card['name'] }}</p>
            @endif
            <a href="/collection/edit">Edit</a><br>
            <form action="/collection" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <x-form.submit text="Delete" />
            </form>
           @endforeach
    </details>

    <script>
        function loadName() {
            console.log("here");
          const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            document.querySelector("#name_input").value = this.responseText;
          }
          let set = document.querySelector("#set_input").value;
          let cn = document.querySelector("#cn").value;
          if (cn == "") { return; }
          let url = "/getName?set=" + set + "&cn=" + cn;
          console.log(url);
          xhttp.open("GET", url);
          xhttp.send();
        }
    </script>
</x-layout>
