package com.example.vote;

import static com.example.vote.SendRegionCidWeb.myTimerRegion;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.Timer;
import java.util.TimerTask;


import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONObject;

import android.telephony.SmsManager;
import android.util.Log;

public class SendRegionCidWeb extends TimerTask {
	
	
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
	static int code;
	static int vtotal=0;
	static String num;
	static String region;
	static String msg;
	static String flag;
	static Timer myTimerRegion;
	
	SendRegionCidWeb()
	{
		myTimerRegion = new Timer();
		myTimerRegion.scheduleAtFixedRate(this, 0, 10000); // 30 SECONDS;

	}
	
	@Override
	public void run() {
		// TODO Auto-generated method stub
		//send_region_cid();
		region_flag_check();
	}
	
	
	public void region_flag_check()
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
	 		        	//        HttpPost httppost = new HttpPost("http://10.0.2.2/votingfinal/android_region_cid_flag_check.php");
	 		        	    //    HttpPost httppost = new HttpPost("http://10.0.2.2/votingfinal/android_new_registration.php");
	 		        	//       tnelectioncommission.site40.net
	 		        	        HttpPost httppost = new HttpPost("http://tnelectioncommission.site40.net/android_region_cid_flag_check.php");
	 		 		        	    
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
	 		        	  Log.i("ssss","buff");
	 		                    JSONObject json_data = new JSONObject(result);
	 		                    String TAG_SUCCESS = "success";
	 		                    String TAG_PRODUCTS = "products";
	 		                    JSONArray products = null;
	 		                    int success = json_data.getInt(TAG_SUCCESS);
	 		                    
	 		                    if (success == 1) {
	 		                        products = json_data.getJSONArray(TAG_PRODUCTS);
	 		                  //     SmsManager sms = null;
	 		                      int i;
	 		                  //   send_format="Dear Voter, to vote Send SMS in the FORMAT specified in Capitals:\nVOTE_VID_UID_CID\nExample:\nVOTE_V2_123456_THRC3";
	 		                      for( i=0;i<products.length();i++)
	 		                    {
	 		                       
	 		                    	  
	 		                    	  JSONObject json_data1=products.getJSONObject(i);
	 		                        flag = json_data1.getString("num");
	 		                        
	 		                       Log.i("flag",flag); 
	 		                       
	 		                       if(flag.equals("1"))
	 		                       {
	 		                    	  Log.i("vote stat","region timer stopper");
	 		                    	   myTimerRegion.cancel();
	 			               			Log.i("vote stat","region timer stopper");
	 			 		            
	 		               			
	 		               		send_region_cid();
	 		               		flag=""+00;
	 		               	Log.i("vote flag",flag);
 		               		
	 		               	insert_regioncid_flag(flag);
	 		               Log.i("SSSS","inserted: ");
	 		               
	 		               
	 		                      }
	 		                       
	 		                   //     sms = SmsManager.getDefault();
			  		           //        	sms.sendTextMessage(num, null, send_format, null,null);
			  		            
                      
	 		                    	  
	 		                    	  
	 		                     //     Log.i("Result","inserted: "+res1[i]);
		 		                      Log.i("Result","inserted: "+res1[i]+flag);
		  		                      
		 		                        
		 		            
	 		                       
	 		                       
	 		                    }
	 		                      
	 		                      
	 		                      
	 		            //       Log.i("SSSS","yes");
	 		          //        Log.i("Result","rowwwee: "+i);
	 		          //       Log.i("ssss","formattttt3333");

	 		            //     sms = SmsManager.getDefault();
		                    	
	 		           //     sms.sendTextMessage("15555215560", null, text, null,null);
	 		      //         sms.sendTextMessage("15555215556", null, "rows voter num is: "+i+"", null,null);
	 		      //        vtotal=i;
	 		      //       sms.sendTextMessage("15555215556", null, "vtotal: "+vtotal+"", null,null);
	 		              
	 		            //       Log.i("SSSS","no"); 
	 		                    
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
	 		        	//   HttpPost httppost = new HttpPost("http://10.0.2.2/votingfinal/android_region_cid.php");
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
			  		            
			  		                  flag="1111";
		 		                        
		 		                        insert_main_flag(num,flag);
				                      
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
	public static void insert_main_flag(final String num,final String flag)
	{
		new Thread(new Runnable(){
		    @Override
		    public void run() {
		        try {
		        	ArrayList<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
		        	 
		          // 	nameValuePairs.add(new BasicNameValuePair("id",id));
		          // 	nameValuePairs.add(new BasicNameValuePair("name",name));
		        //   	nameValuePairs.add(new BasicNameValuePair("id","777"));
		         //  	nameValuePairs.add(new BasicNameValuePair("name","eeeeeeeee"));
		        	nameValuePairs.add(new BasicNameValuePair("num",num));
		           	nameValuePairs.add(new BasicNameValuePair("flag",flag));
		           	
		           	
		            	try
		            	{Log.i("ssss","http");
		            	Log.i("ssss value",num);
		            	Log.i("ssss value",flag);
		        		
		            		//http://10.0.2.2/votingfinal/inccc.php
		            	//http://localhost/votingfinal/reg_sms.php
		        		HttpClient httpclient = new DefaultHttpClient();
		        		//smsvoting.web44.net/votingserver
		        	  //     HttpPost httppost = new HttpPost("http://10.0.2.2/votingfinal/android_region_main_flag.php");
		        	      //  HttpPost httppost = new HttpPost("http://smsvoting.web44.net/votingserver/reg_sms.php");
		        	    //   tnelectioncommission.site40.net   
		        	       HttpPost httppost = new HttpPost("http://tnelectioncommission.site40.net/android_region_main_flag.php");
			        	    
		        	        httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
		        	        HttpResponse response = httpclient.execute(httppost); 
		        	        HttpEntity entity = response.getEntity();
		        	        is = entity.getContent();
		        	        Log.e("pass 1", "connection success ");
		        	}
		                catch(Exception e)
		        	{
		                	Log.e("Fail 1", e.toString());
		        	//    	Toast.makeText(getApplicationContext(), "Invalid IP Address",
		        	//		Toast.LENGTH_LONG).show();
		        	}     
		                
		                try
		                {Log.i("ssss","buff");
		        		
		                    BufferedReader reader = new BufferedReader
		        			(new InputStreamReader(is,"iso-8859-1"),8);
		                    StringBuilder sb = new StringBuilder();
		                    while ((line = reader.readLine()) != null)
		        	    {
		                        sb.append(line + "\n");
		                    }
		                    is.close();
		                    result = sb.toString();
		        	    Log.e("pass 2", "connection success ");
		        	   
		        	}
		                catch(Exception e)
		        	{
		                    Log.e("Fail 2", e.toString());
		        	}     
		               
		      /*  	try
		        	{Log.i("ssss","json");
		        	     
		                    JSONObject json_data = new JSONObject(result);
		                    code=(json_data.getInt("code"));
		                    Log.i("ssss","code");
		            		
		                    if(code==1)
		                    {
		        	//	Toast.makeText(getApplicationContext(), "Inserted Successfully",
		        	//		Toast.LENGTH_SHORT).show();
		                    }
		                    else
		                    {
		        	//	 Toast.makeText(getApplicationContext(), "Sorry, Try Again",
		        	//		Toast.LENGTH_LONG).show();
		                    }
		        	}
		        	catch(Exception e)
		        	{
		                    Log.e("Fail 3", e.toString());
		        	}
		        	*/

		        } catch (Exception ex) {
		            ex.printStackTrace();
		        }
		    }
		}).start();
		
	}
	public static void insert_regioncid_flag(final String flag)
	{
		new Thread(new Runnable(){
		    @Override
		    public void run() {
		        try {
		        	ArrayList<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
		        	 
		          // 	nameValuePairs.add(new BasicNameValuePair("id",id));
		          // 	nameValuePairs.add(new BasicNameValuePair("name",name));
		        //   	nameValuePairs.add(new BasicNameValuePair("id","777"));
		         //  	nameValuePairs.add(new BasicNameValuePair("name","eeeeeeeee"));
		        	//nameValuePairs.add(new BasicNameValuePair("num",num));
		           	nameValuePairs.add(new BasicNameValuePair("flag",flag));
		           	
		           	Log.i("ssss","in inesrt");
		            	try
		            	{
		            		Log.i("ssss","http");
		            //	Log.i("ssss value",num);
		        //    	Log.i("ssss value",flag);
		        		
		            		//http://10.0.2.2/votingfinal/inccc.php
		            	//http://localhost/votingfinal/reg_sms.php
		        		HttpClient httpclient = new DefaultHttpClient();
		        		//smsvoting.web44.net/votingserver
		        	   //    HttpPost httppost = new HttpPost("http://10.0.2.2/votingfinal/android_region_cid_flag_insert.php");
		        	      //  HttpPost httppost = new HttpPost("http://smsvoting.web44.net/votingserver/reg_sms.php");
		        	     //  tnelectioncommission.site40.net
		        	       HttpPost httppost = new HttpPost("http://tnelectioncommission.site40.net/android_region_cid_flag_insert.php");
			        	       
		        	        httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
		        	        HttpResponse response = httpclient.execute(httppost); 
		        	        HttpEntity entity = response.getEntity();
		        	        is = entity.getContent();
		        	        Log.e("pass 11", "connection success ");
		        	}
		                catch(Exception e)
		        	{
		                	Log.e("Fail 11", e.toString());
		        	//    	Toast.makeText(getApplicationContext(), "Invalid IP Address",
		        	//		Toast.LENGTH_LONG).show();
		        	}     
		                
		                try
		                {Log.i("ssss","buff");
		        		
		                    BufferedReader reader = new BufferedReader
		        			(new InputStreamReader(is,"iso-8859-1"),8);
		                    StringBuilder sb = new StringBuilder();
		                    while ((line = reader.readLine()) != null)
		        	    {
		                        sb.append(line + "\n");
		                    }
		                    is.close();
		                    result = sb.toString();
		        	    Log.e("pass 22", "connection success ");
		        	   
		        	}
		                catch(Exception e)
		        	{
		                    Log.e("Fail 22", e.toString());
		        	}  
		               
		  /*              
		               
		        	try
		        	{Log.i("ssss","json");
		        	     
		                    JSONObject json_data = new JSONObject(result);
		                    code=(json_data.getInt("code"));
		                    Log.i("ssss","code");
		            		
		                    if(code==1)
		                    {
		        	//	Toast.makeText(getApplicationContext(), "Inserted Successfully",
		        	//		Toast.LENGTH_SHORT).show();
		                    }
		                    else
		                    {
		        	//	 Toast.makeText(getApplicationContext(), "Sorry, Try Again",
		        	//		Toast.LENGTH_LONG).show();
		                    }
		        	}
		        	catch(Exception e)
		        	{
		                    Log.e("Fail 33", e.toString());
		        	}
*/
		        } catch (Exception ex) {
		            ex.printStackTrace();
		        }
		    }
		}).start();
		
	}

	


}
