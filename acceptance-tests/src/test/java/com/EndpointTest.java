package com;

import org.junit.jupiter.api.Test;
import org.apache.hc.client5.http.fluent.Request;

//import org.concordion.integration.junit4.ConcordionRunner;
//import org.junit.runner.RunWith;

import static org.junit.jupiter.api.Assertions.assertTrue;

public class EndpointTest {

	@Test
	void callEndpoint() throws Exception {
	    String ip = System.getProperty("externalIp");

	    assertTrue(ip != null && !ip.isBlank(), "externalIp system property is missing");
	    
        if (!ip.startsWith("http://") && !ip.startsWith("https://")) {
            ip = "http://" + ip;
        }
	    
	    String response = Request.get(ip)
	            .execute()
	            .returnContent()
	            .asString();

	    assertTrue(!response.trim().isEmpty(), "Endpoint returned an empty response");
	}

    
    public boolean isNonEmpty(String s) {
        return s != null && !s.trim().isEmpty();
    }
}