@extends('layouts.public')
@section('title', 'Politica de confidențialitate')

@section('content')
    <section class="bg-green-700 text-white py-20">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-4xl font-bold">🔒 Politica de confidențialitate</h1>
            <p class="text-green-100 mt-2">Ultima actualizare: {{ date('d.m.Y') }}</p>
        </div>
    </section>

    <section class="max-w-4xl mx-auto px-4 py-16">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-12 space-y-10 text-gray-700 leading-relaxed">

            <div>
                <p class="text-lg">
                    Smart-Exim SRL respectă confidențialitatea vizitatorilor săi și se angajează să protejeze
                    datele cu caracter personal pe care le colectează. Această politică explică ce date colectăm,
                    cum le folosim și ce drepturi aveți. 🌱
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-green-700 mb-3">📋 1. Date pe care le colectăm</h2>
                <p>Putem colecta următoarele categorii de date atunci când interacționați cu site-ul nostru:</p>
                <ul class="list-disc list-inside mt-3 space-y-1">
                    <li>Nume și prenume</li>
                    <li>Adresă de email</li>
                    <li>Mesajele trimise prin formularul de contact</li>
                    <li>Date tehnice (adresă IP, tip de browser, pagini vizitate)</li>
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-green-700 mb-3">🎯 2. Cum folosim datele</h2>
                <p>Datele colectate sunt utilizate exclusiv pentru:</p>
                <ul class="list-disc list-inside mt-3 space-y-1">
                    <li>Răspunsul la întrebările și solicitările dumneavoastră</li>
                    <li>Îmbunătățirea serviciilor și a experienței pe site</li>
                    <li>Comunicări legate de comenzi sau colaborări comerciale</li>
                    <li>Respectarea obligațiilor legale</li>
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-green-700 mb-3">🍪 3. Cookie-uri</h2>
                <p>
                    Site-ul nostru poate folosi cookie-uri pentru a asigura buna funcționare și pentru a analiza
                    traficul. Puteți gestiona sau dezactiva cookie-urile din setările browserului dumneavoastră.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-green-700 mb-3">🤝 4. Partajarea datelor</h2>
                <p>
                    Nu vindem și nu închiriem datele dumneavoastră personale către terți. Datele pot fi partajate
                    doar cu furnizori de servicii de încredere care ne ajută să operăm site-ul, sau atunci când
                    legea ne obligă.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-green-700 mb-3">🛡️ 5. Securitatea datelor</h2>
                <p>
                    Aplicăm măsuri tehnice și organizatorice adecvate pentru a proteja datele dumneavoastră
                    împotriva accesului neautorizat, pierderii sau divulgării.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-green-700 mb-3">⚖️ 6. Drepturile dumneavoastră</h2>
                <p>În conformitate cu legislația privind protecția datelor (GDPR), aveți dreptul la:</p>
                <ul class="list-disc list-inside mt-3 space-y-1">
                    <li>Acces la datele dumneavoastră personale</li>
                    <li>Rectificarea datelor incorecte</li>
                    <li>Ștergerea datelor („dreptul de a fi uitat")</li>
                    <li>Restricționarea sau opoziția la prelucrare</li>
                    <li>Portabilitatea datelor</li>
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-green-700 mb-3">⏳ 7. Păstrarea datelor</h2>
                <p>
                    Păstrăm datele personale doar atât timp cât este necesar pentru scopurile descrise mai sus
                    sau cât impune legislația în vigoare.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-green-700 mb-3">📝 8. Modificări ale politicii</h2>
                <p>
                    Ne rezervăm dreptul de a actualiza această politică periodic. Orice modificare va fi publicată
                    pe această pagină, împreună cu data ultimei actualizări.
                </p>
            </div>

            <div class="bg-green-50 rounded-xl p-6">
                <h2 class="text-2xl font-bold text-green-700 mb-3">📧 9. Contact</h2>
                <p>
                    Pentru orice întrebare legată de această politică sau de datele dumneavoastră, ne puteți
                    contacta la:
                </p>
                <ul class="mt-3 space-y-1">
                    <li>✉️ Email: contact@smart-exim.md</li>
                    <li>📞 Telefon: +373 22 000 000</li>
                    <li>📍 Adresă: Satul Colicăuți, Raionul Briceni, Republica Moldova</li>
                </ul>
            </div>

        </div>
    </section>
@endsection
