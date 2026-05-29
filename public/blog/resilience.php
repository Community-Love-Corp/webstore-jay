
<!DOCTYPE html>
        <head>
             <meta charset="UTF-8"> 
            <link rel="stylesheet" href="./css/blog.css">
        <title>Professionalism brings Resilience</title>
          <!-- Google reCAPTCHA script -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
          <style>
            body {
                background: linear-gradient(to bottom, #e6f3ff, #b3d9ff);
            }
        </style>
    </head>
    <body style="text-align: center;">
    <h1>ENGINEERING IS ABOUT SUSTAINABLE DEVELOPMENT- SCIENCE AND TECHNOLOGY THAT HARMONISES BODY, MIND AND SOUL  - ‘TEMPLATE FOR ENTRY INTO DEVSECOPS WITH TEST DRIVEN DEVELOPMENT’ 
    <br>==============================</h1>



<div class="auth-box-main">
    <h2 id="1summary">1.0 SUMMARY</h2>
    <p>---------------------</p>
    <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;Good software development practice involves automation and focused efforts, something that can be sewn around a ‘common/shared understanding’, an understanding which a team can trust and take pride in. The mana and clarity of this understanding can then make the paradigm “there is no ‘I’ in a team” practical. Yes, nowadays AI has a lot of promise, however common sense is that it is a means to an end. Software Development Utopia, still remains in following 'Good Software engineering practice' via:
    
    <br><br>- a balanced DevSecOps pipeline, according to time, place and circumstances (see Annex A and Annex B for how the latter principle applies conceptually)</p>
    
    <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;It facilitates code that is maintainable and reliable, even in a cross functional ‘team of teams’ context, where anyone can be asked to pick it up and support it. To this end, this post demonstrates a ‘Proof of Concept’/framework/template, a simple REACT front end client app consuming a node.js server backend microservice, setup with continuous integration using a pipeline in Github Actions, that integrates with Azure Cloud at runtime to retrieve secrets from Key vault. This is a good starting point for a project, so it starts out with the correct building blocks. </p>

<i id="mm1tdd1" style="text-align: center;"> Item 1: Sample of Test Driven Development using jUnit and Concordian.</i>
<p>
    <img src="images/tdd.jpg"
         class="auth-img"
         alt="Test Driven Development">
</p>



           <h2 id="2administration">2.0 ADMINISTRATION</h2>
            
            <h3 id="21change-log">2.1 CHANGE LOG</h3>
            <p>---------------------</p>
    
                <div class="center-text">        
                    <table>
                      <thead>
	                        <tr>
        	                  <td><b>Version</b></td> 
                	          <td><b>Author</b></td>
                        	  <td><b>Date</b></td>
                        	  <td><b>Description</b></td>
                        	</tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1.0</td>
                          <td>Sarna, J.</td>
                          <td>26 March 2026</td>
                          <td>Initial Draft And Release to Production</td>
                        </tr>
                          <tr>
                          <td>1.1</td>
                          <td>Sarna, J.</td>
                          <td>28 March 2026</td>
                          <td>Added Section 13.0 Disclaimer, and a few minor updates.</td>
                        </tr>
                                            <tr>
                          <td>1.2</td>
                          <td>Sarna, J.</td>
                          <td>05 April 2026</td>
                          <td>Added Section 9.0 Annex A.</td>
                        </tr>
                                            <tr>
                          <td>2.0</td>
                          <td>Sarna, J.</td>
                          <td>05 April 2026</td>
                          <td>Final updates to format, content and references to improve accuracy e.g. BBC's 'AI Decoded' episode addition.</td>
                        </tr>
                                            <tr>
                          <td>2.1</td>
                          <td>Sarna, J.</td>
                          <td>09 April 2026</td>
                          <td>Added reference to IEEE Code of Ethics, to explain family inspiration. Also added reference to 'The Republic' in Annex A to explain immense impact of positivity in history.</td>
                        </tr>
                                                                <tr>
                          <td>3.0</td>
                          <td>Sarna, J.</td>
                          <td>30 April 2026</td>
                          <td>Added Section 10 Annex B.</td>
                        </tr>
                        </tr>
                         <tr>
                          <td>4.0</td>
                          <td>Sarna, J.</td>
                          <td>06 May 2026</td>
                          <td>In the service of my whakapapa/ancestry, added references to 'anecdotes from popular culture' and 'ancient wisdom texts', to substitute archeological evidence in Sections '10 Annex B.' and '8.0 Inspiration' for accurately dating 'Pre Medieval borders of India' and its 'native culture's Oath book', respectively.</td>
                        </tr>
                          <td>5.0</td>
                          <td>Sarna, J.</td>
                          <td>07 May 2026</td>
                          <td>Added Archeological evidence to back up version 4.0 above.</td>
                        </tr>
                        </tr>
                          <td>6.0</td>
                          <td>Sarna, J.</td>
                          <td>08 May 2026</td>
                          <td>Mothers day update to Section '7.0 Acknowledgements', and note to celebrate my mentor's 100th birthday in Section '8.0 Inspiration'.</td>
                        </tr>
                      </tbody>
                    </table>
                </div>  
            <h3 id="22toc">2.2 TABLE OF CONTENTS</h3>
            <p>---------------------</p>
            <div class="center-text">
                <table>
                    <thead>
                        <tr>
                            <td><b>ID</b></td>
                            <td><b>Title</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td><b>1.0</b></td>
                          <td><a href="#1summary"><b>SUMMARY</b></a></td>
                        </tr>
                        <tr>
                          <td>2.0</td>
                          <td><a href="#2administration">ADMINISTRATION</a></td>
                        </tr>
                        <tr>
                          <td>2.1</td>
                          <td><a class="indent" href="#21change-log">CHANGE LOG</a></td>
                        </tr>
                        <tr>
                          <td>2.2</td>
                          <td><a class="indent" href="#22toc">TABLE OF CONTENTS</a></td>
                        </tr>
                        <tr>
                          <td>2.3</td>
                          <td><a class="indent" href="#23tom">TABLE OF MULTIMEDIA (FIGURES, TABLES, AUDIO AND VIDEO)</a></td>
                        </tr>     
                        <tr>
                          <td>3.0</td>
                          <td><a href="#3introduction">INTRODUCTION</a></td>
                        </tr>
                        <tr>
                          <td>4.0</td>
                          <td><a href="#4motivation">MOTIVATION</a></td>
                        </tr>
                       <tr>
                          <td>5.0</td>
                          <td><a href="#5fundamentals">FUNDAMENTALS</a></td>
                        </tr>
                        <tr>
                        <td>6.0</td>
                          <td><a href="#6conclusion">CONCLUSION</a></td>
                        </tr>
                        <tr>
                          <td>7.0</td>
                          <td><a href="#7acknowledgements">ACKNOWLEDGEMENTS</a></td>
                        </tr>
                        <tr>
                          <td>8.0</td>
                          <td><a href="#8inspiration">INSPIRATION</a></td>
                        </tr>
                        <tr>
                          <td>9.0</td>
                          <td><a href="#9annexA">ANNEX A - VALUE OF POSITIVITY</a></td>
                        </tr>
                        <tr>
                          <td>10.0</td>
                          <td><a href="#10annexB">ANNEX B - SEEING INTENTIONS</a></td>
                        </tr>
                        <tr>
                          <td>11.0</td>
                          <td><a href="#11annexC">ANNEX C - COMMUNICATION</a></td>
                        </tr>
                        <tr>
                          <td>12.0</td>
                          <td><a href="#12annexD">ANNEX D - FINANCIAL DOLDRUMS</a></td>
                        </tr>
                        <tr>
                          <td>13.0</td>
                          <td><a href="#13annexE">ANNEX E - JOB HUNT IN 'GEN Z' ERA</a></td>
                        </tr>                        
                        <tr>
                          <td>14.0</td>
                          <td><a href="#14references">REFERENCES</a></td>
                        </tr>
                        <tr>
                          <td>15.0</td>
                          <td><a href="#15disclaimer">DISCLAIMER</a></td>
                        </tr>
                    </tbody>
                </table>
            </div> 
            <h3 id="23tom">2.3 TABLE OF MULTIMEDIA (FIGURES, CHARTS, TABLES, AUDIO AND VIDEO)</h3>
            <p>---------------------</p>
            <div class="center-text">
                <table>
                    <thead>
                        <tr>
                            <td><b>ID</b></td>
                            <td><b>Title</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td><b>1.0</b></td>
                          <td><a href="#mm1tdd1"><b>TEST DRIVEN DEVELOPMENT</b></a></td>
                        </tr>
                        <tr>
                          <td><b>2.0</b></td>
                          <td><a href="#mm2devsecops"><b>DEVSECOPS PIPELINE DEPLOYING API APPLICATION ON AZURE KUBERNETES CLUSTER</b></a></td>
                        </tr>
                        <tr>
                        <tr>
                          <td>3.0</td>
                          <td><a href="#mm3tdd">TEST DRIVEN DEVELOPMENT IN IMPLEMENTED VIA NODE.JS FRAMEWORK'S TEST CAPABILITY</a></td>
                        </tr>
                      <tr>
                          <td><b>4.0</b></td>
                          <td><a href="#mm4decsecops-tier4-security"><b>DEVSECOPS: CONTINOUS SECURITY</b></a></td>
                        </tr>
                        <tr>
                          <td><b>5.0</b></td>
                          <td><a href="#mm5devsecops-tier4"><b>BASIC DEVSECOPS SOLUTION DESIGN</b></a></td>
                        </tr>
                        <tr>
                        <tr>
                          <td>6.0</td>
                          <td><a href="#mm6workingfromhome">OTAGO UNIVERSITY RESEARCHER ON "WORKING FROM HOME" IN RADIO NEW ZEALAND CHECKPOINT PROGRAMME</a></td>
                        </tr>
                          <tr>
                          <td>7.0</td>
                          <td><a href="#mm7adage">RESILIENCE</a></td>
                        </tr>
                        <tr>
                          <td>8.0</td>
                          <td><a href="#mm8pennydrops">JOURNAL ENTRY: SUCCESS IN CONTEXTUAL COMMUNICATION WITHIN A CLOSE KNIT TEAM</a></td>
                        </tr>
                        <tr>
                          <td>9.0</td>
                          <td><a href="#mm9aijobhunt">'GEN Z' ERA JOB HUNT PARADIGM</a></td>
                        </tr>
                        mm9aijobhunt
		    <tbody>
		</table>
	    </div>          
    <h2 id="4introduction">4.0 INTRODUCTION</h2>
    
    <p style="text-align: left;" class="indent">When I introduce myself as a Software Engineer, surprised often people ask, how is programming/coding an engineering field? Is engineering not about building bridges and skyscrapers?</p>
    
    <p style="text-align: left;" class="indent">My answer is yes, it is. Today, tell me what does not use software. Software when made under certain guidelines/discipline comes under the banner of software engineering. Two such disciplines are:</p>
    
    <p style="text-align: left;"> a) Devsecops, and


    <p style="text-align: left;">b) Test driven development (TDD).</p>
    
    <p style="text-align: justify;" class="indent">Devsecops is means to develop, secure, test and deploy code which enables responsive and rapid movement of a business case or idea to a functional outcome/upgrade in production. 

<br><br>
It is achieved via four sub components:
<br><br>
a) CONTINOUS INTEGRATION - via automating testing as seen in <a href="#mm1tdd1">Item 1</a>. It is triggered off when change committed to code (configuration management), i.e. "on the fly".
<br><br>
b) CONTINOUS SECURITY - via implementing systems and processes which enable only non-vulnerable code to be written, at all times.
<br><br>
c) CONTINOUS DEPLOYMENT - via implementing code that installs applications on environments, "on the fly" based on if tests 'as part of continuous integration' passed. 
<br><br>
d) CONTINOUS OPERATIONS - via implementing 'Infrastructure As a Service' that enables entire environments (including networking components) to be created, connected and even cleaned via code, in the cloud.
<br><br>

<p><i id="mm2devsecops" style="text-align: center;"> Item 2: DevSecOps pipeline takes code of a node.js application running on Kubernetes locally, deploys an Azure Kubernetes Cluster and install it on it.</i></p>

    <p><b style="text-align: center;"><u>BEFORE</u></b></p>

<p><i style="text-align: center;"> Item 2.1: Local Kubernetes api Application </i></p>

<p><img src="images/OperationalK38Proof.jpg" class="auth-img" alt="OPERATIONAL API APPLICATION RUNNING ON LOCAL KUBERNETES CLUSTER"></p>

    <p><b style="text-align: center;"><u>AFTER</u></b></p>

<p><i style="text-align: center;"> Item 2.2: DevSecOps pipeline in BoundlessLove/Devsecops-tier2 GitHub repository deploys Azure Kubernetes Cluster </i></p>

<p><img src="images/evidenceAKS.jpg" class="auth-img" alt="OUTCOME OF DEVSECOPS PIPELINE - AZURE KUBERNETES CLUSTER"></p>

<p><i style="text-align: center;"> Item 2.3: DevSecOps pipeline in BoundlessLove/Devsecops-tier2 GitHub repository deploys api application to Azure Kubernetes Cluster </i></p>

<p><img src="images/OperationalAzureProof.jpg" class="auth-img"  alt="WEBSITE DEPLOYED ON AZURE KUBERNETES CLUSTER"></p>


<p>In the past software developers always did have unit tests in their code for basic health checks. However, Devsecops takes this concept to the next level as it attempts to automate frontline testing too e.g. end to end system tests, the domain of the IT Quality Assurance profession.</p>
    
    <p style="text-align: justify;" class="indent">To further this Continuous Integration paradigm, Test Driven Development (TDD) can be introduced into it. TDD is the idea that all code is written only to satisfy tests. So, the development process would involve identifying stories, which would distil into requirements, which in turn would lead to automated tests and then code would be written to satisfy those acceptance tests:</p>
    
    <p style="text-align: justify;">- Stories > requirements > automated tests > code written to satisfy tests<p>

<i id="mm3tdd" style="text-align: center;"> Item 3: Sample of Test Driven Development demonstrated using node.js framework's native test function.</i>

<p><img src="images/tdd1.jpg" class="auth-img" alt="Test Driven Development"></p>
    
    <p style="text-align: justify;" class="indent">If changes in the form of new design vectors or business requirements appear, rapid re-factoring would realign the development effort. I first came across TDD at my Software Engineering degree at the University of Auckland in the early 2000s, as part of learning Xtreme programming, which can be slated as a somewhat precursor to DevSecOps.</p>    
    
    <p style="text-align: justify;" class="indent">Following such 'Best practices' builds code that is holistic for the people who create it, the people who consume it and the people who support it, as the underlying paradigms and principles follow 'high maturity' constructs, building 'love and care' vectors like maintainability and reliability into the product - good for the body, mind and soul (His Holiness Radhanath Swami, 2025, December, 15, 2:00-3:00).</p>
    
    <h2 id="4motivation">4.0 MOTIVATION</h2>
    
      
    <p style="text-align: justify;" class="indent"> Mr. Paul Joseph Goebbels, the propaganda minister of NAZI Germany during WWII famously said along the lines of that if a lie is repeated often enough, the standard human psyche starts accepting it as ‘true’. In modern lingo, we call it disinformation. In the era of chaos caused by over hype of capabilities of Artificial Intelligence (AI), people struggle to see that AI is the new wild west frontier (Bogan, 2026, Pg. 55), i.e. needs to be treated with caution, and yet it is important to discern that our future is in the correct use of AI (His Holiness Radhanath Swami, 2025, December, 15, 5:00-7:00). The overwhelming propaganda for AI today is coming from adverts being pumped at us in Social Media by those with the clout and intent to keep us confused. This kind of disinformation is also the theme of the recent winner of the "Best Animated Feature" at Academy awards - "K-Pop Demon Hunters" (Rashid, 2026, March, 16). To keep my narrative positive, in the Spirit of Non-violence, I see it as a test from Providence, which only the discerning will pass (BBC News, 2026, April, 4).</p>
      
    <p style="text-align: left;" class="indent">If AI is seen for what it is, a tool, then:</p>
    
    <p style="text-align: left;">- the lessons about sustainable software engineering practice from my university golden days remain valid today.  </p>
    
    <p style="text-align: left;" class="indent">I seek to refocus the world to what is important – the fundamentals of Software Engineering practice. Hence this blog post is about fundamentals of DevSecOps practice, as I experienced it.</p>
    
    <h2 id="5fundamentals">5.0 FUNDAMENTALS OF DEVSECOPS</h2>

    
    <p style="text-align: justify;" class="indent">I demonstrate this via two GitHub ACTIONS projects. The first one incorporates a simple node.js micro server and a simple REACT client consuming that microservice’s API endpoints. What makes it special is that all the code was produced in the spirit of Test Driven Development. Further, as per CONTINOUS INTEGRATION (CI) paradigm of DEVSECOPS, any updates to the code trigger a CI pipeline that runs those tests, providing instant feedback about:</p>
    
    <p style="text-align: left;">- Is code quality up to the mark for deployment to production.</p>
    
    <p style="text-align: justify;" class="indent">Lastly, in 2026, any code outside the cloud automatically gets the label of legacy, and hence the dev branch of the repository integrates this DEVSECOPS model code to Azure Cloud. The server has an endpoint that requires an API KEY to access it. The code hence:</p>
    
    <p style="text-align: left;">- retrieves APIKEY at runtime from Key vault in Azure Cloud as part of continuous integration, and uses it to run tests</p>
    
    <p style="text-align: left;" class="indent">Please see GITHUB repo for details:</p>
    
    <p style="text-align: left;">- https://github.com/BoundlessLove/devsecops-tier1/tree/dev</p>
    
    <p style="text-align: justify;" class="indent">Further, DEVSECOPS also includes the CONTINOUS DEPLOYMENT (CD) Paradigm, i.e. any updates to the code, are at once tested under CI and then deployed to STAGING for User Acceptance Testing. CONTINUOUS SECURITY and CONTINUOUS OPERATIONS are the other aspects of DEVSECOPS.

<p><i id="mm4decsecops-tier4-security" style="text-align: center;"> Item 4: DEVSECOPS CONTINUOUS SECURITY- IBM SYNK plugin in Eclipse used to identify vulnerable packages and remediate via suggested upgrades.</i>
    <br><br><img src="images/devsecops-tier4-security.jpg" class="auth-img" alt="CONTINUOUS SECURITY IMPLEMENTED WITH ECLIPSE SYNK PLUGIN"></p>    



<p>Please find a practical demonstration of these three operate via a node.js server on Azure Kubernetes cloud in a GITHUB CICD pipeline using Concordian (Java Gradle) based Acceptance and unit tests: </p>
    
    <p style="text-align: left;">- https://github.com/BoundlessLove/devsecops-tier3/tree/dev</p>
    
    <p style="text-align: left;" class="indent">For those starting off with containerisation, following is the cluster deployed locally using Docker Desktop with the readme.md as a great learning guide: </p>
    
    <p style="text-align: left;">- https://github.com/BoundlessLove/devsecops-tier2/tree/dev</p>
    
    <p style="text-align: left;" class="indent">Transitioning from devsecops-tier2 (Dev Branch) local Kubernetes setup to production like Azure Kubernetes setup is demonstrated in the following repository with cookbook.md and readme.md: </p>
    
    <p style="text-align: left;">- https://github.com/BoundlessLove/devsecops-tier4/tree/staging</p>
<i id="mm5devsecops-tier4" style="text-align: center;"> Item 5: A Basic Production like Dev Sec Ops solution design - Application running on Azure Kubernetes Cloud utilising Cloudflare. Assumption is that Cloudflare integration application with on-premises Domain. </i>
    <img src="images/devsecops-tier4.jpg" class="auth-img"  alt="A design for a basic Production Like AKS solution">    

    <h2 id="6conclusion">6.0 CONCLUSION</h2>
    
    
    <p style="text-align: justify;" class="indent">This post presents the concept and code behind the motivation that a software engineering project starting with its fundamentals aligned to best software engineering practices is more likely to succeed in the long run. Justification is found in adage:</p>
    
    <p style="text-align: left;">- "A stitch in time, saves nine"- Thomas Fuller (1732 from book 'Gnomologia: Adagies and Proverbs'),</p>
    
    <h2 id="7acknowledgements">7.0 ACKNOWLEDGEMENTS</h2>
    
    <p style="text-align: justify;" class="indent">I am from the IT Quality Assurance Engineering profession, a discipline I have been a part of since 2007. In 2021, a new QA standard was introduced IEEE 29119 Part 6- Software testing on Agile Projects. It made the unusual step of providing a guideline that quality assurance professionals will no longer create bugs/defects – refer to section 4.2.26 Informal Defect Management (ISO/IEC/IEEE, 2021, Pg.12-13). This shook my professional beliefs and practices to the core and I am still recovering. The impact is multifaceted and profound. There are many layers of truth in this standard, however, people tend to take shortcuts and in the chaos of conversations, often the voice of reason gets drowned out. To me the standard emphasises the urgent need to apply test automation in QA practice, but it is not a license to do away with essential documentation, where the ‘essential’ is defined in a Test Policy (formalised by QA subject matter expert/s only)- refer to section ‘4.2.17 Eliminate Waste’ of standard (ISO/IEC/IEEE, 2021, Pg. 10). </p>
    
    <p style="text-align: justify;" class="indent">My efforts to communicate this essential fact were exasperated due to the mechanics of working from home. Basically, due to the onset of covid, since 2019, working environment required "working from home" and team meetings were held remotely. A key part of communication is "reading the room", where staff having difficult conversations can change their tone or content or delay the conversation by judging the body language of the listener/s. However, with working from home, some decided to keep their videos off and then mob mentality took over leaving me with my quality professional needs behind. As a result, more than usual arbitary decisions I felt were being made which were counter productive to the firm's long term growth and prosperity, i.e. no documentation was being generated that would enable the consolidation of what had been achieved. Please refer to Radio New Zealand Checkpoint for the dynamics introduced by this seemingly permanent change in workplace behaviour(Craig, 2025, March 19):<br><br>
    
<i id="mm6workingfromhome" style="text-align: center;"> Item 6: Radio New Zealand Checkpoint programme 19 March 2025 interview with researcher on "Working from Home".</i>
	<audio controls class="center-audio">
		<source src="audio/rnz-working-from-home.mp3" type="audio/mpeg">
  			Your browser does not support the audio element.>
	</audio>

    <br><br>A lot happened since, which I only remember via the adage:</p>
    
<p><i id="mm7adage" style="text-align: center;"> Item 7: "Remember that even your worst day is better that someone's best day".</i>
    <br><br><img src="images/resilience.jpg" class="auth-img" alt="Your worst day is better than someone's best day"></p>

    
    
    <p style="text-align: justify;" class="indent">Getting bogged down with negotiating an ever losing battle on this front, instead I redirected my ‘chi’, in the spirit of transforming my struggles into strength. I began on a journey of rediscovering the joy of being a programmer by upskilling and investing in what forged me in this career all those years ago at university- Software Engineering (His Holiness Radhanath Swami, 2019, Aug, 9). </p>
    
    <p style="text-align: left;" class="indent">Lastly, I thank my mother who have put up with my Trademe Sam Morgan type ‘stay at home’ vagrancy (O'Donnell, 2010) with a young family, while I negotiate my way through the New 'AI paradigm' driven jobhunt (ANNEX E), in an ever worsening environment (see Annex D). See Annex C for how the peace has been maintained.</p>
    
    <h2 id="8inspiration">8.0 INSPIRATION</h2>
    
    <p style="text-align: justify;" class="indent">a) My late paternal grand mother/aunt Sanatana Dharma Nun Her Holiness Kumari Raj Sarna, who asked us to live by higher principles - Engineering Ethics (IEEE, 2026) and Ancestral guidance from scriptures such as the Holy MAHĀBHĀRATA VANA PARVA CHAPTER 313 VERSE 128  (Ram/राम , 2024, Pg. 993), source of our faith's <a href="./misconceptions.php">5092 year old OATH book </a>(Achar, 2014, Pg. 29). </p>
    <p style="text-align: justify;" class="indent">a) My Sustainability mentor (Scholey et al., 2020), Sir David Attenborough, who turned 100 today (Puschmann, 2026, May, 8). </p>
    
    <p style="text-align: left;">Jay Sarna, BE (Software), CEH
    <br>https://testdrivendevelopment.azurewebsites.net/cicd.html</p>
    
    <h2 id="9annexA">9.0 ANNEX A- VALUE OF POSITIVITY</h2>
      
    <p style="text-align: justify;" class="indent">For example in history, it is often seen that there are roughly two camps- "the do gooders" and the "the do no-gooders" amongst any group of people. However, as it happens, fate sometimes makes righteous souls to be born in "do no-gooders camp" and vice versa. For example, in a prevailing time of violent resistance to colonisation across the world in early 1900s, Mahatma Gandhi (Father of Modern India) advocated non-violent resistance to oppose unjust use of power by UK. He firmly believed "An eye for an eye will leave the whole world blind", redirecting the "chi" of his multi faith "Indian National Congress" peers to respectful peaceful co-existence, in the name of "One God". This is best expressed in my view in the lyrics of the song 'Land of the noble' (Essar & Delawari, 2017) in 2017's 'Best Animated' Academy Award nominee film, the Afgan 'The Breadwinner' (Twomey, 2017). Hence, modern India became a model of non-violent resistance, sparking later the character of legends like Dr. Martin Luther King, Sir Nelson Mandela and Former US President Obama (Mendez II, 2025, Jul, 19) (Obama, 2009, April, 06). Similarly, the beacon of Non-violence in New Zealand is 'Te Whaea o te Motu'/'Mother of the Nation'-  Wahine Toa Dame Whina Cooper who operated in the spirit of Te Tiriti o Waitangi when dealing with unjust use of power in a colonialism context (Hemi-Morehouse & Hill, 2025, August, 12) (Robertson & Jones, 2022). They all brought relative calmness and somewhat correct focus in a time of great upheaval. </p>
    
    <p style="text-align: left;" class="indent">Truth is that humanity cannot survive in negativity and eventually caves in as all progress eventually needs positivity to embed itself. There are multiple examples of this in history, such as: </p>
    
    <h3> a. GOLDEN PERIOD OF HELLENESTIC AGE: </h3>
    
    <p style="text-align: justify;" class="indent">For example, the Greek Philosopher Plato in his 360 B.C. work 'The Republic' expressed when talking about Greeks, "Slavery as being worse than death" (BOOK III) and generally argued it as being unjust (Book V 469b–471c), advising diplomacy (what he called discord) to replace violence in his ideal Greek state. This was at a time when the practice of slavery was commonplace amongst Greeks and something that did not effectively begin to halt until Dr. Martin Luther King and his "Non-Violent" movement convinced Late US President Lyndon B. Johnson to sign the Civil Rights Act of 1964. Such shots at positivity even in 'fallen' ancient history gave the Greek nation a moral edge to unite and further motivated them to try to spread it across the known world (at a lesser degree), making them masters of their era (Plato, 360 B.C.E).</p>
    
    <h3> b. NEGATIVITY DRIVEN DARK AGES:  </h3>
    
    <p style="text-align: justify;" class="indent">Looking at Medieval history, my peaceful 'Sanatana Dharma' native ancestors of the North-Western region of the Indian Sub-continent were displaced in waves by the 'violent ideology'/jihad fueled by disinformation and quest for booty, from an extremist brand of a faith for over millennia. My ancestors refused to be intimidated or accept/assimilate the disinformation forced on us by the violent despite the near complete annihilation of the native culture (via obliteration of the supportive ecosystem). It was the ancient books that kept the knowledge safe. With the books, the spirit of 'Non-Violence' resistance could be re-awakened via strong faith in Providence, and my ancestors focused on self-help and education in an ever-worsening environment. </p>
    
    <p style="text-align: left;" class="indent">However, this is a very hard thing, that is easier said than done, requiring an almost obsessive discipline on the face of it, to weather with zero/negative support as testitifed by University of Auckland Doctor Ma'u as sustained poverty leads even to physiological impacts such as early onset of dementia /'loss of memory' (Ma’u, 2026, April, 08). </p>
    
    <p style="text-align: left;">They were prepared to be internally displaced in search for mortal safety, and took the long term view that :
    
    <br><br>- "Remember my friend, that knowledge is stronger than memory, and we should not trust the weaker."</P>

<p style="text-align: right;">- Bram Stoker </p>
    
    <p style="text-align: justify;" class="indent">As it was going to happen, with time, the same conquering parties disavowed the animalism in their very beliefs that enabled them to intimidate and do 'ISIL, Taliban and Al Qaeda' level unimaginable grotesque violence on the natives (Okoth-Obbo, 2020, August, 2), when they wanted cooperation from the conquered and forcibly converted in order for progress (see Munajat-Nama / 'Intimate Conversations' (Ansari, 1978)), leading to a trail of excellence and wisdom amongst many people of that background in the Subcontinent (vedictreasure.official, 2025, April, 12). From a scientific perspective only, there is plenty of clear archeological evidence of Sanatana Dharma's presence in North Western parts of the Sub continent (Kolesnikov & Iskender-Mochiri, 1996, Pg. 174) and <a href="./misconception-root-cause.php">sustained attempts at its obliteration</a>. However, what is most surprising is that despite over a millenia of supression of humanity by 'Taliban like' influences there, even lived human evidence (albeit fast fading) still exists, as expressed in 2017 'Afganistan themed' movie 'The Breadwinner', where Taliban controlled regions are called 'Ariana- the land of the noble'. In it, the wise elders in the movie, even on their death bed ensure that the new generations are at least aware of this name which is contrary to 'Taliban type extremist' rule of the time (Twomey, 2017). This name can be corroborated in Sanatana Dharma Oath book, where the word "Aryan" is used with the same meaning in Chapter 2 Verse 2 (Chinmayananda, 1997, Pg. 49), and this term categorically has no relation to NAZI Germany's 'colonial superiority' driven gross cultural misappropriation of an entire way of life, inorder to overwhelm the subjects into a mystical awe, so it could conduct the most unimaginable henious crimes. The proof of this is the use of Roman symbolism and paraphanelia during the Nuremberg rallies, which had nothing to do with 'Sanatana Dharma' way of life, but all to do with Nazi Germany's desire to expand like the Roman Empire of pre-middle ages.     
    
    <h3> c. CONCLUSION: </h3>
    
    <p style="text-align: left;" class="indent">Hence, it is adherence to righteous knowledge and character, which is the 100% guarantee to stay on the correct path, based on "time, place and circumstances".</p>
    
    <h2 id="10annexB">10.0 ANNEX B - SEEING INTENTIONS  (Das, 2006, Pg. 489)</h2>
      
    <p style="text-align: justify;" class="indent">No one has seen the future, and a lot of decisions are made on intentions, looking at the big picture. While it is possible to look under every nook and cranny to find the complete 100% answer, life is organic and neither the assessor nor the assessed can wait forever for the perfect answer. Hence, decisions are based on overall trajectory or the essential nature of subject. This is best explained in my view from the following blurb from the Śrīmad Bhagavad Gītā:</p>
    
    <p style="text-align: justify;" class="indent"><b>Question:- </b> The Lord (God), reciprocates the same sentiment with which the devotee [seeker] seeks Him [Her/Them]. If a devotee approaches Him [Her/Them] with the sentiment of hatred or enmity etc., will the Lord, reciprocate the same ?</p>
    
    <p style="text-align: justify;" class="indent"><b>Answer:- </b> This is a topic of surrender (refuge) to Him [Her/Them], rather than hatred or enmity. So, no such question, should arise. Even then, if we think over the question seriously, we come to realise that the purpose of the Lord in reciprocating the same sentiment to the person concerned, is to inspire him [/her/them] for salvation. The Lord is a disinterested friend of all beings (Gītā 5/29). Therefore, he [she/ they] thinks of their welfare and acts, accordingly.</p>

    <h2 id="11annexC">11.0 ANNEX C - JOURNAL ENTRY 02 MAY 2026: THE PENNY DROPS FOR FAMILY </h2>
<p><i id="mm8pennydrops" style="text-align: center;"> Item 8: The penny drops for my family.</i>
    <img src="images/penny-drops.jpg" class="auth-img" alt="Journal entry Saturday 02 May 2026"></p>

    <h2 id="12annexD">12.0 ANNEX D - FINANCIAL DOLDRUMS- WORSENING ECONOMY (RNZ Checkpoint, 2026, May, 6)</h2>
    
    <p style="text-align: justify;" class="indent"> Cost of living pressures are spiralling out of control as unemployment hits 10 year record high.</p>
    
    <h2 id="13annexE">13.0 ANNEX E - JOB HUNT IN 'GEN Z' ERA- 'AI PARADIGM'  (RNZ Checkpoint, 2026, May, 6)</h2>
    
    <i id="mm9aijobhunt" style="text-align: center;"> Item 9: Radio New Zealand Checkpoint programme 6 May 2026 interview with researcher on "AI Job Screening".</i>
	<audio controls class="center-audio">
		<source src="audio/rnz-ai-jobhunt.mp3" type="audio/mpeg">
  			Your browser does not support the audio element.>
	</audio>
	
	<p style="text-align: justify;" class="indent">Job seekers say not being able to tell if some companies are using AI to screen their cover letters and CVs is dehumanising.</p>

</div>
<div class="auth-box-main">            
    <h2 id="14references">14.0 REFERENCES</h2>
    <p style="text-align: left;">
        1. Bogan, C.(2026).Very Brief History of Synthetic Media. Behind the AI MASK- Protecting your business from deepfakes. Published by John Wiley & Sons, Inc., Hoboken, New Jersey.
        <br><br>2. His Holiness Radhanath Swami.(2025, Dec, 15).YouTube- Technology for the Soul | Radhanath Swami | Massachusetts Institute of Technology. https://youtu.be/UiL8zUp54ow?si=DTHKmBTDZ5GoomGd. Last  Accessed 26 March 2026.
           
        <br><br>3. His Holiness Radhanath Swami.(2019, Aug, 9). YouTube- Transforming Our Struggles Into Strength | His Holiness Radhanath Swami. https://www.youtube.com/watch?v=abmsniEmfh0. Last  Accessed 26 March 2026.
           
        <br><br>4. International Organization for Standardization (ISO)/ International Electrotechnical Commission (IEC)/ Institute of Electrical and Electrical Engineers (IEEE). (2021). ISO/IEC/IEEE 29119 6:2021(E): Software and systems engineering — Software testing — Part 6:  (all parts) in agile life cycles. Published by ISO.
           
        <br><br>5. O'Donnell, M. (2010). Trade Me: The inside story. Phantom House Books
            
        <br><br>6. Mendez II, M.(2025, Jul, 19).  Out.com - Barack Obama explains why he thinks all men need queer people in their lives. https://www.out.com/news/barack-obama-gay-friends.Last Accessed 05 April 2026.
        <br><br>7. Obama, B. (2009, April, 06). United States Government- The White House President Barrack Obama- Remarks by the President at Cairo University, 6-04-09- REMARKS BY THE PRESIDENT ON A NEW BEGINNING. https://obamawhitehouse.archives.gov/the-press-office/remarks-president-cairo-university-6-04-09. Last Accessed 05 April 2026.
            
        <br><br>8. Robertson, J. N., Jones, P. W. (2022). New Zealand Film Commission | Te Tumu Whakaata Taonga -Whina. https://www.nzfilm.co.nz/films/whina. Last accessed 02 February 2026.
            
        <br><br>9. Hemi-Morehouse, S., Hill, D.(2025, August, 12). Mother of the Nation: Whina Cooper- Whina Cooper and the Long Walk for Justice. Published by Penguin Books.
            
        <br><br>10. Hemi-Morehouse, S., Hill, D.(2025, August, 12). Te Whaea o te Motu- Whina Cooper me te Hīkoi roa mō te Manatika. Translated into te reo Māori by Morrison, S. Published by Penguin Books.
            
        <br><br>11.0 BBC News.(2026, April, 4). AI Decoded - Episode 10: Are humans useless in the AI workspace?. https://www.bbc.co.uk/programmes/m002bc0j
        
        <br><br>12.0 Rashid, R.(2026, March, 16). The Guardian- Oscars 2026- South Korea celebrates ‘miracle’ Oscar wins for KPop Demon Hunters. https://www.theguardian.com/film/2026/mar/16/kpop-demon-hunters-oscar-wins-golden-performance. Last Accessed: 30 April 2026
        
        <br><br>13.0 Ansari, A. (1978). Kwaja Abdullah Ansari: The Invocations (Munajat) (W. M. Thackston, Trans.). Paulist Press. (Original work published c. 1088).
        
        <br><br>14.0 Okoth-Obbo, V. (2020, August, 2). United Nations Development Programme (UNDP)- Home > Iraq > Stories > Six Years After Sinjar Massacre, Support and Services are Vital for Returning Yazidis.https://www.undp.org/iraq/stories/six-years-after-sinjar-massacre-support-and-services-are-vital-returning-yazidis. Last Accessed: 05 April 2026
        
        <br><br>15.0 IEEE- Advancing Technology for Humanity. (2026). IEEE Code of Ethics. https://www.ieee.org/about/corporate/governance/p7-8. Last accessed 02 February 2026
        
        <br><br>16.0  [Hindi Mahabharata] साहित्याचार्य पंडित रामनारायण दत्त शास्त्री पांडेय 'राम'.(2024). अध्याय 313 - यक्ष और युधिष्ठिर का प्रश्नोत्तर और युधिष्ठिर के उत्तर से संतुष्ट हुए यक्ष का चरणों भाइयों को जीवित होने का वरदान देना. श्रीमन महर्षि वेदव्यास प्रणीत महाभारत (द्वितीय खंड) - वनपर्व और विराटपर्व, सचित्र, सरल हिन्दी-अनुवादसहित. प्रकाशक एवं बुद्रक- गीता प्रेस गोरखपुर, गोबिंदभवन-कार्यालय, कोलकाता का संस्थानान Code 33. मूल सच्ची कहानी 3102 ईसा पूर्व में प्रकाशित हुई (द्रिकपंचांग के अनुसार) 
        
        <br><br>17.0 Plato.(360 B.C.E). Book III. Massachusetts Institute of Technology Classics- The Republic. Translated by Jowett, B. https://classics.mit.edu/Plato/republic.4.iii.html . Last Accessed 9 April 2026
        
        <br><br>18.0 Plato.(360 B.C.E). Book V. Massachusetts Institute of Technology Classics- The Republic. Translated by Jowett, B. https://classics.mit.edu/Plato/republic.6.v.html . Last Accessed 9 April 2026
        
        <br><br>19.0 vedictreasure.official.(2025, April, 12). Instagram- Tabla master ustad Zakir Hussain speaks of his faith being devout muslim but worships bhagwan Ganesh and goddess Saraswati...Source: https://www.instagram.com/reel/DIWEwKzhKRv/. Last Accessed: 17 April 2026 
        
        <br><br>20.0 Ma’u, E. (2026, April, 08). University of  Auckland- Home> News and opinion- Dementia rates pushed up by poverty, says expert. Source: https://www.auckland.ac.nz/en/news/2026/04/08/etuini-mau-poverty-linked-to-dementia-psychological-medicine.html. Last Accessed: 17 April 2026
        
        <br><br>21.0  Das, R.(2006). Śrīmad Bhagavadgītā Sādhaka-Sañjīvanī [with Appendix] Vol. I Commentary [With Sanskrit text, Transliteration and English Translation] (Translated into English by S. C. Vaishya) Revised by R.N. Kaul & Kesnoran Aggarwal. Published by Gita Press Gorakhpur. (Original work published c. 3067 B.C.E.)
        
        <br><br>22.0 Craig, B. (2025, March 19). 5 years since COVID pandemic and start of Zoom meetings [Audio]. RNZ – Checkpoint. https://www.rnz.co.nz/national/programmes/checkpoint/audio/2018979543/5-years-since-covid-pandemic-and-start-of-zoom-meetings. Last Accessed: 30 April 2026

        <br><br>23. Essar, Q., & Delawari, A. (2017). Land of the noble [Song]. On The Breadwinner (Original Motion Picture Soundtrack). Lakeshore Records.
                
        <br><br>24.0 Achar, B. N. N.(2014). Revisiting the Date of Mahabharata war: astronomical methods using planetarium software. Scribd. https://www.scribd.com/document/366258717/Mahabharat-War-Dating-3067-BC-Prof-narahari-Achar. Last Accessed 6 May 2026

		<br><br>25.0 Chinmayananda, S. (1976). The Holy Geeta (Commentary on Bhagavad Gita 2.2). (1996 ed.). Central Chinmaya Mission Trust.

		<br><br>26.0 Raj, S. (2022, June, 28). <i>Overview of India's Historical Evolution.</i>.SCRIBD.
		
		<br><br>27.0 Scholey, K., Hughes, J., Fothergill, A.(2020). Netflix- David Attenborough: A Life on our planet. https://www.netflix.com/nz/title/80216393. Last Accessed: 8 May 2026
		
		<br><br>28.0 RNZ Checkpoint.(2026, May, 6). RNZ- Business- Checkpoint- Fuel costs, household expences on the rise as economy heads into 'choppy waters'. https://www.rnz.co.nz/news/business/594331/fuel-costs-household-expenses-on-the-rise-as-economy-heads-into-choppy-waters. Last Accessed: 8 May 2025

		<br><br>29.0 RNZ Checkpoint.(2026, May, 6). RNZ- Employment- AI job screening creates gap between jobseekers and employers. https://www.rnz.co.nz/national/programmes/checkpoint/audio/2019033904/ai-job-screening-creates-gap-between-jobseekers-and-employers. Last Accessed 08 May 2026.

		<br><br>30.0 Puschmann, K.(2026, May, 8). Life- People- Celebrity- Sir David Attenborough turns 100. https://www.rnz.co.nz/life/people/celebrity/sir-david-attenborough-turns-100. Last Accessed: 8 May 2026


    </p>
    <h2 id="15disclaimer">15.0 DISCLAIMER</h2>
    
    <p style="text-align: left;">This post is written in good faith, please forgive mistakes. Also see my <a href="https://www.facebook.com/story.php?story_fbid=122176707806768040&id=61573041203371&http_ref=eyJ0cyI6MTc3NjgxNzk2MjAwMCwiciI6IiJ9">facebook blog </a> </p>
    
    <p style="text-align: justify;"><Strong>© 2026 Jyotirmay Sarna. This work is original. Do not copy, repost, or use without permission.</Strong> See <a href="https://www.blog.systematicdefence.tech/license.html">Legal license</a>.</p>


  <form id="14comments" action="submit_comment.php" method="POST" style="text-align: center;">
    <label for="name">Name</label><br>
    <input type="text" id="name" name="name"
           value="<?php echo $_POST['name'] ?? ''; ?>" required><br><br>

    <label for="comment">Comment</label><br>
    <textarea id="comment" name="comment" rows="4" required><?php echo $_POST['comment'] ?? '';?></textarea>
        
        <div class=center-image>
        <!-- reCAPTCHA widget -->
        <div class="g-recaptcha" data-sitekey="6Lcn79QsAAAAAEyY__XtQYcfS0aCbMTCwUq3xA-c"></div><br>
    </div>
    <button type="submit">Post Comment</button>
  </form>
  <script>
document.querySelector("form").addEventListener("submit", function(e) {
    var response = grecaptcha.getResponse();

    if (response.length === 0) {
        e.preventDefault(); // stop form from submitting
        alert("Please complete the CAPTCHA before submitting.");
        return false;
    }
});
</script>
<?php
$commentsFile = "comments.json";

$comments = [];

// Load file only if it exists and contains valid JSON
if (file_exists($commentsFile)) {
    $json = file_get_contents($commentsFile);
    $decoded = json_decode($json, true);

    if (is_array($decoded)) {
        $comments = $decoded;
    }
}

// Now $comments is ALWAYS an array
foreach ($comments as $c) {
    echo "<div class='comment-box'>";
    echo "<strong>" . $c['name'] . "</strong><br>";
    echo "<p>" . nl2br($c['comment']) . "</p>";
    echo "<small>" . $c['time'] . "</small>";
    echo "</div><hr>";
}
?>

<a href="./index.html"><h2>HOME<h2></a>

</div>

</body>
</html>

