package com.example.vote;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONArray;
import org.json.JSONObject;

import android.telephony.SmsManager;
import android.util.Log;

public class SendRegionCid {
	
	
//	static TextView messageBox;
	static InputStream is=null;
	static String result=null;
	static String line=null;
	static String res1[] = new String[100];
	static String vnum[] = new String[100];
    static String cid_text;
     
	
	
	String name;
	String id;
//	InputStream is=null;
//	String result=null;
//	String line=null;
	int code;
	static int vtotal=0;
	static String num;
	static String region;
	static String msg;
	public static void send_region_cid()
	{
		 new Thread(new Runnable(){
	    	 
	 		 

	 		   public void run() {
	 		        try {
	 		        	
	 		            	try
	 		            	{
	 		        		HttpClient httpclient = new DefaultHttpClient();
	 		        		//http://localhost/android.php
	 		        		//http://localhost/aaaa.php
	 		        		//http://localhost/votingfinal/bbbb.php
	 		        		//http://smsvoting.web44.net/votingserver
	 		        	     //   HttpPost httppost = new HttpPost("http://smsvoting.web44.net/votingserver/reg_cid.php");
	 		        	  // HttpPost httppost = new HttpPost("http://10.0.2.2/votingfinal/android_region_cid.php");
	 		        	      
	 		        	 // tnelectioncommission.site40.net
	 		        	 HttpPost httppost = new HttpPost("http://tnelectioncommission.site40.net/android_region_cid.php");
	 		        	   
	 		        	        HttpResponse response = httpclient.execute(httppost); 
	 		        	        HttpEntity entity = response.getEntity();
	 		        	        is = entity.getContent();
	 		        	        Log.e("pass 1", "connection success ");
	 		        	        Log.i("ssss","http");

	 		        	}
	 		                catch(Exception e)
	 		        	{
	 		                	Log.e("Fail 1", e.toString());
	 		        //	    	Toast.makeText(getApplicationContext(), "Invalid IP Address",
	 		        	//		Toast.LENGTH_LONG).show();
	 		        	}     
	 		                
	 		                try
	 		                {
	 		                    BufferedReader reader = new BufferedReader
	 		        			(new InputStreamReader(is,"iso-8859-1"),8);
	 		                    StringBuilder sb = new StringBuilder();
	 		                    Log.i("ssss","buff");

	 		                    while ((line = reader.readLine()) != null)
	 		        	    {
	 		                        sb.append(line + "\n");
	 		                    }
	 		                    is.close();
	 		                    result = sb.toString();
	 		        	    Log.e("pass 2", "connection success vnum");
	 		        	}
	 		                catch(Exception e)
	 		        	{
	 		                    Log.e("Fail 2", e.toString());
	 		        	}     
	 		               
	 		        	try
	 		        	{Log.i("ssss","json in vnum");

	 		                    JSONObject json_data = new JSONObject(result);
	 		                    String TAG_SUCCESS = "success";
	 		                    String TAG_PRODUCTS = "products";
	 		                    JSONArray products = null;
	 		                    int success = json_data.getInt(TAG_SUCCESS);
	 		                    
	 		                    if (success == 1) {
	 		                        products = json_data.getJSONArray(TAG_PRODUCTS);
	 		                       SmsManager sms = null;
	 		                      int i;
	 		                     cid_text=null;
	 		                     cid_text="Candidate names and codes: \n";
	 		              
	 		                    for( i=0;i<products.length();i++)
	 		                    {
	 		                        JSONObject json_data1=products.getJSONObject(i);
	 		                     //   vnum[i] = json_data1.getString("num");
	 		                        
	 		                        
	 		                       num=json_data1.getString("num");
	 		                  //    na=json_data1.getString("name");
	 		                     region=json_data1.getString("region");
	 		                       msg=json_data1.getString("msg");
	 		             //      cid_text=cid_text+na+" - "+cid+"\n";
	 		               
	 		                      Log.i("Result",""+num+region+msg);
		 		                     
	 		                        sms = SmsManager.getDefault();
			  		                   	sms.sendTextMessage(num, null, region+"\n"+msg, null,null);
			  		            
	 		                       
	 		                    }
	 		                   Log.i("SSSS","yes");
	 		                  Log.i("Result","rowwwee: "+i);
	 		           //      sms = SmsManager.getDefault();
		                //    	
	 		           //     sms.sendTextMessage("15555215560", null, text, null,null);
	 		           //    sms.sendTextMessage("15555215556", null, "rows voter num is: "+i+"", null,null);
	 		          //    vtotal=i;
	 		          //   sms.sendTextMessage("15555215556", null, "vtotal: "+vtotal+"", null,null);
	 		              
	 		              //     Log.i("SSSS","no"); 
	 		                    
	 		                    }
	 		                    else
	 		                    {
	 		                    
	 		                    }
	 		        	}
	 		        	catch(Exception e)
	 		        	{
	 		                    Log.e("Fail 3", e.toString());
	 		        	}

	 		        } catch (Exception ex) {
	 		            ex.printStackTrace();
	 		        }
					
	 		    }
	 		    
	         
	 		}).start();
	}


}
