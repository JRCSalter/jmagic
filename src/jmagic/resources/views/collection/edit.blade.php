<x-layout title="JMagic - My Collection">
    <h2 role="heading" aria-level="2">Edit</h2>

    <form action="/collection/update" method="POST">
        <x-form.datalist id="name" :options="$cardNames" />
        <x-form.datalist id="set" :options="$setNames" />
        <x-form.input id="cn" label="Collector Number" onkeyup="loadName()"/>
        <x-form.select id="condition" :options="$conditions" required />
        <x-form.select id="finish" :options="$treatments" required />
        <x-form.select id="lang" :options="$languages" required />
        <x-form.textarea id="notes" />
        <x-form.number id="quantity" value="1"/>
        <x-form.number id="purchase" step="0.01" />
        <x-form.checkbox id="alter" />
        <x-form.checkbox id="proxy" />
        <x-form.select id="binder" :options="$binders"/>
        <x-form.select id="deck" :options="$decks"/>
        <x-form.submit />
    </form>
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

