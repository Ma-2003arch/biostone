<x-mail::message>
# Introduction

salut votre message a ete bien recu
veillez cliquez sur le lien si desous

<x-mail::button :,[url => $url]>
Cliquez ici
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
