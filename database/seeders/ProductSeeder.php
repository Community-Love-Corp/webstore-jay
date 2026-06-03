<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;



class ProductSeeder extends Seeder

{
    
    public function run(): void
    
    {
        
        Product::create([
            //'id' => 1,
            'slug' => 'dynamically-reconfigurable-webservices-1',
            
            'title' => 'FRAMEWORK FOR DYNAMIC RECONFIGURATION OF WEB SERVICES',
            
            'price' => 4.99,
            
            
            
            // This is the public abstract shown before purchase
            
            //'abstract_html' => '<p>This is a sample abstract for a product. HTML is allowed.</p>',
            'abstract_html' => <<<EOS
          <h1>FRAMEWORK FOR DYNAMIC RECONFIGURATION OF WEB SERVICES</h1>\r
          \r
          <p style="text-align: center;" >Department of Electrical and Computer Engineering, Auckland, New Zealand\r
          <br>University of Auckland \r
          <br>Jyotirmay Sarna</p>\r
          \r
          <p><b>Abstract</b></p> \r
          <p style="text-align: justify;" class="indent">&nbsp;&nbsp;All software requires maintenance, even one that runs over networks. We have designed and implemented a way to do scheduled maintenance on Web Services without forcing any downtime. The means is to dynamically switch Web Services at runtime with a backup Web Service, so that the clients face no interruptions and the maintainers can upgrade the \r
          original Web Service. In the research phase two key \r
          things were established. Firstly, that an external \r
          application (manager) used by the "maintenance administrator" would be needed to initiate Web Service switching. Secondly on the Client side, an interceptor layer will be needed to manage the extra functionality introduced by Dynamic Reconfiguration. Based on this understanding, we designed and implemented two frameworks called Interrupt based and Exception based design.</p> \r
          \r
          <p style="text-align: justify;" class="indent">&nbsp;&nbsp; Interrupt based is where the Manager interrupts the client with a new Web Service address. In Exception based, the Client's request to the Web Service is responded to with an exception, which triggers its interceptor layer to connect to the UDDI (Online Web Service Address directory) and get the new Web Service address. This entire process happens in under 0.2 seconds for both of our frameworks. </p>\r
          \r
          <p>Here is the Poster for the presentation:</p>\r
          \r
          {{IMAGE:k0zzm5OkSUg0207SfvrzK5OrQs2V52kYlKEsPOf3.jpg}}
          EOS,
            
            
            // This is the full content shown only after purchase
            
            // Use placeholder links so the UI works without real uploads
            
  /*          'full_html' => '
            
                <h2>Full Product Content</h2>
            
                <p>This is sample full content for testing.</p>
            
            
            
                <p><strong>Sample Image:</strong></p>
            
                <img src="/storage/sample-image.jpg" alt="Sample">
            
            
            
                <p><strong>Sample PDF:</strong></p>
            
                <a href="/storage/sample-document.pdf" target="_blank">Download PDF</a>
            
            ',*/
            
            'full_html' => <<<EOS
          <p>Please Click 'Buy Now' to purchase Whitepaper.</p>\r
          \r
          <h2>The paper:</h2>\r
          \r
          {{PDF:avURNSNSkNCSOlaq82SmnIy4V57ueEosWYJEpH9M.pdf}}
          EOS,
            
        ]);
            
            
        
    }
    
}

