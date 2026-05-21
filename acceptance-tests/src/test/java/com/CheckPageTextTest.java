
/*
 * How to run test:
 * 
 * 1. Powershell: 
 * a) ./gradlew clean test "-DexternalIp=127.0.0.1"
 * b) ./gradlew clean test "-DexternalIp=localhost"
 * 
 * 2. Windows CMD
 * a) gradlew clean test -DexternalIp=127.0.0.1
 * 
 * 3. Git Bash / WSL / Linux / macOS
 * a) ./gradlew clean test -DexternalIp=127.0.0.1
 */

package com;

import org.concordion.integration.junit4.ConcordionRunner;
import org.junit.runner.RunWith;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

@RunWith(ConcordionRunner.class)
public class CheckPageTextTest {

    public boolean urlContainsText(String url, String text) throws Exception {
        URL u = new URL(url);
        HttpURLConnection conn = (HttpURLConnection) u.openConnection();
        conn.setRequestMethod("GET");

        BufferedReader reader = new BufferedReader(
                new InputStreamReader(conn.getInputStream())
        );

        StringBuilder sb = new StringBuilder();
        String line;

        while ((line = reader.readLine()) != null) {
            sb.append(line);
        }
        
        System.out.println("=== RESPONSE START ===");
        System.out.println(sb.toString());
        System.out.println("=== RESPONSE END ===");


        reader.close();
        conn.disconnect();

        return sb.toString().contains(text);
    }
    
    public String getTestPhrase() {
        System.out.println("DEBUG testPhrase = " + System.getProperty("testPhrase"));
        String testPhrase = System.getProperty("testPhrase");

        if (testPhrase == null || testPhrase.isBlank()) {
            throw new IllegalArgumentException("testPhrase system property is missing");
        }

        return testPhrase;
    }
    
    public String getTestUrl() {
        System.out.println("DEBUG IP = " + System.getProperty("externalIp"));
    	String ip = System.getProperty("externalIp");

        if (ip == null || ip.isBlank()) {
            throw new IllegalArgumentException("externalIp system property is missing");
        }
        
        if (!ip.startsWith("http://") && !ip.startsWith("https://")) {
            ip = "http://" + ip;
        }
        System.out.println("DEBUG FINAL IP = " + ip);

        //return "http://" + ip + "/";
        return ip;

    }
}
