@extends('layouts.cms')

@section('content')

@php
    $source = 'resilience';
    $comments = \App\Models\Comment::where('source_page', $source)
                                   ->orderBy('id', 'desc')
                                   ->get();
@endphp

<h1>ENGINEERING IS ABOUT SUSTAINABLE DEVELOPMENT- SCIENCE AND TECHNOLOGY THAT HARMONISES BODY, MIND AND SOUL  - ‘TEMPLATE FOR ENTRY INTO DEVSECOPS WITH TEST DRIVEN DEVELOPMENT’ 
<br>==============================</h1>

@php
	//Print Build Number
	$buildNumber = trim(file_get_contents(base_path('build_number.txt')));
@endphp

<div>Build: {{ $buildNumber }}</div>
<div class="auth-box-main">
	<div style="text-align: center;">

    	<h2 id="11annexa">11.0 ANNEX C - JOURNAL ENTRY 02 MAY 2026: THE PENNY DROPS FOR FAMILY </h2>
		<p><i id="mm8pennydrops" style="text-align: center;"> Item 8: The penny drops for my family.</i>
 		<img src="{{ asset('images/penny-drops.jpg') }}" class="auth-img" alt="Journal entry Saturday 02 May 2026"></p>    
	</div>
    <div class="auth-box-main">            
        <h2 id="12references">12.0 REFERENCES</h2>
        <p style="text-align: left;">
            1. Bogan, C.(2026).Very Brief History of Synthetic Media. Behind the AI MASK- Protecting your business from deepfakes. Published by John Wiley & Sons, Inc., Hoboken, New Jersey.
            <br><br>2. His Holiness Radhanath Swami.(2025, Dec, 15).YouTube- Technology for the Soul | Radhanath Swami | Massachusetts Institute of Technology. https://youtu.be/UiL8zUp54ow?si=DTHKmBTDZ5GoomGd. Last  Accessed 26 March 2026.
               
            <br><br>3. His Holiness Radhanath Swami.(2019, Aug, 9). YouTube- Transforming Our Struggles Into Strength | His Holiness Radhanath Swami. https://www.youtube.com/watch?v=abmsniEmfh0. Last  Accessed 26 March 2026.
               
            <br><br>4. International Organization for Standardization (ISO)/ International Electrotechnical Commission (IEC)/ Institute of Electrical and Electrical Engineers (IEEE). (2021). ISO/IEC/IEEE 29119 6:2021(E): Software and systems engineering — Software testing — Part 6:  (all parts) in agile life cycles. Published by ISO.
               
            <br><br>5. O'Donnell, M. (2010). Trade Me: The inside story. Phantom House Books
                
            <br><br>6. Mendez II, M.(2025, Jul, 19).  Out.com - Barack Obama explains why he thinks all men need queer people in their lives. https://www.out.com/news/barack-obama-gay-friends.Last Accessed 05 April 2026.
            <br><br>13. Obama, B. (2009, April, 06). United States Government- The White House President Barrack Obama- Remarks by the President at Cairo University, 6-04-09- REMARKS BY THE PRESIDENT ON A NEW BEGINNING. https://obamawhitehouse.archives.gov/the-press-office/remarks-president-cairo-university-6-04-09. Last Accessed 05 April 2026.
                
            <br><br>15. Robertson, J. N., Jones, P. W. (2022). New Zealand Film Commission | Te Tumu Whakaata Taonga -Whina. https://www.nzfilm.co.nz/films/whina. Last accessed 02 February 2026.
                
            <br><br>17. Hemi-Morehouse, S., Hill, D.(2025, August, 12). Mother of the Nation: Whina Cooper- Whina Cooper and the Long Walk for Justice. Published by Penguin Books.
                
            <br><br>19. Hemi-Morehouse, S., Hill, D.(2025, August, 12). Te Whaea o te Motu- Whina Cooper me te Hīkoi roa mō te Manatika. Translated into te reo Māori by Morrison, S. Published by Penguin Books.
                
            <br><br>11.0 BBC News.(2026, April, 4). AI Decoded - Episode 10: Are humans useless in the AI workspace?. https://www.bbc.co.uk/programmes/m002bc0j
            
            <br><br>12.0 Rashid, R.(2026, March, 16). The Guardian- Oscars 2026- South Korea celebrates ‘miracle’ Oscar wins for KPop Demon Hunters. https://www.theguardian.com/film/2026/mar/16/kpop-demon-hunters-oscar-wins-golden-performance. Last Accessed: 30 April 2026
            
            <br><br>13.0 Ansari, A. (1978). Kwaja Abdullah Ansari: The Invocations (Munajat) (W. M. Thackston, Trans.). Paulist Press. (Original work published c. 1088).
            
            <br><br>14.0 Okoth-Obbo, V. (2020, August, 2). United Nations Development Programme (UNDP)- Home > Iraq > Stories > Six Years After Sinjar Massacre, Support and Services are Vital for Returning Yazidis.https://www.undp.org/iraq/stories/six-years-after-sinjar-massacre-support-and-services-are-vital-returning-yazidis. Last Accessed: 05 April 2026
            
            <br><br>15.0 IEEE- Advancing Technology for Humanity. (2026). IEEE Code of Ethics. https://www.ieee.org/about/corporate/governance/p7-8. Last accessed 02 February 2026
            
            <br><br>16.0  [Hindi Mahabharata] साहित्याचार्य पंडित रामनारायण दत्त शास्त्री पांडेय 'राम'.(2024). अध्याय 313 - यक्ष और युधिष्ठिर का प्रश्नोत्तर और युधिष्ठिर के उत्तर से संतुष्ट हुए यक्ष का चरणों भाइयों को जीवित होने का वरदान देना. श्रीमन महर्षि वेदव्यास प्रणीत महाभारत (द्वितीय खंड) - वनपर्व और विराटपर्व, सचित्र, सरल हिन्दी-अनुवादसहित. प्रकाशक एवं बुद्रक- गीता प्रेस गोरखपुर, गोबिंदभवन-कार्यालय, कोलकाता का संस्थानान Code 33. मूल सच्ची कहानी 3102 ईसा पूर्व में प्रकाशित हुई (द्रिकपंचांग के अनुसार) 
            
            <br><br>17.0 Plato.(360 B.C.E). Book III. Massachusetts Institute of Technology Classics- The Republic. Translated by Jowett, B. https://classics.mit.edu/Plato/republic.4.iii.html . Last Accessed 9 April 2026
            
            <br><br>18.0 Plato.(360 B.C.E). Book V. Massachusetts Institute of Technology Classics- The Republic. Translated by Jowett, B. https://classics.mit.edu/Plato/republic.6.v.html . Last Accessed 9 April 2026
            
            <br><br>19.0 vedictreasure.official.(2025, April, 12). Instagram- Tabla master ustad Zakir Hussain speaks of his faith being devout muslim but worships bhagwan Ganesh and goddess Saraswati...Source: https://www.instagram.com/reel/DIWEwKzhKRv/. Last Accessed: 17 April 2026 
            
            <br><br>20.0 Ma’u, E. (2026, April, 08). University of  Aucklnd- Home> News and opinion- Dementia rates pushed up by poverty, says expert. Source: https://www.auckland.ac.nz/en/news/2026/04/08/etuini-mau-poverty-linked-to-dementia-psychological-medicine.html. Last Accessed: 17 April 2026
            
            <br><br>21.0  Das, R.(2006). Śrīmad Bhagavadgītā Sādhaka-Sañjīvanī [with Appendix] Vol. I Commentary [With Sanskrit text, Transliteration and English Translation] (Translated into English by S. C. Vaishya) Revised by R.N. Kaul & Kesnoran Aggarwal. Published by Gita Press Gorakhpur.
            
            <br><br>22.0 Craig, B. (2025, March 19). 5 years since COVID pandemic and start of Zoom meetings [Audio]. RNZ – Checkpoint. https://www.rnz.co.nz/national/programmes/checkpoint/audio/2018979543/5-years-since-covid-pandemic-and-start-of-zoom-meetings. Last Accessed: 30 April 2026
    
    
        </p>
    
        <h2 id="13disclaimer">13.0 DISCLAIMER</h2>
    
        <p style="text-align: left;">
            This post is written in good faith, please forgive mistakes.
            Also see my
            <a href="https://www.facebook.com/story.php?story_fbid=122176707806768040&id=61573041203371&http_ref=eyJ0cyI6MTc3NjgxNzk2MjAwMCwiciI6IiJ9">
                facebook blog
            </a>
        </p>
    
        <p style="text-align: justify;">
            <strong>© 2026 Jyotirmay Sarna. This work is original. Do not copy, repost, or use without permission.</strong>
            See <a href="https://www.blog.systematicdefence.tech/license.html">Legal license</a>.
        </p>
    
        {{-- Shared Comment Component --}}
        <x-comments :source="$source" :comments="$comments" />
    </div>
</div>>
@endsection
