package com.example.vote;

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
import android.widget.Toast;

public class NewRegistrationWeb extends TimerTask{
	
	//static TextView messageBox;
	static InputStream is=null;
	static String result=null;
	static String line=null;
	static String res1[] = new String[100];
	
	
static	String name;
static	String id;
//	InputStream is=null;
//	String result=null;
//	String line=null;
	static int code;
	
	static String num,addr,flag,vid,na,uid;
	static String send_msg;
	static Timer myTimer;
	
	NewRegistrationWeb()
	{
		myTimer = new Timer();
		
//		MyTimerTask myTimerTask= new MyTimerTask();
	//	NewRegistrationWeb myTimerTask= new NewRegistrationWeb();
		
		//myTimer.scheduleAtFixedRate(myTimerTask, 0, 10000); // 30 SECONDS;
		
		myTimer.scheduleAtFixedRate(this, 0, 10000); // 30 SECONDS;
		
	}
	
	@Override
	public void run() {
		// TODO Auto-generated method stub
		new_registration_web();
		Log.i("ssss","formattttt");
	}
	
	public static void new_registration_web()
	{
		 Log.i("ssss","new regist");

		 new Thread(new Runnable(){
	    	 
	 		 

	 		   public void run() {
	 		        try {
	 		        	
	 		            	try
	 		            	{
	 		        		HttpClient httpclient = new DefaultHttpClient();
	 		        		//http://localhost/android.php
	 		        		//http://localhost/aaaa.php
	 		        		//http://localhost/votingfinal/bbbb.php
	 		        	    //    HttpPost httppost = new HttpPost("http://10.0.2.2/votingproject/android_new_registration.php");
	 		        	   //    HttpPost httppost = new HttpPost("http://smsvoting.web44.net/votingserver/voters_db.php");
	 		        	     //  tnelectioncommission.site40.net
	 		        	       HttpPost httppost = new HttpPost("http://tnelectioncommission.site40.net/android_new_registration.php");
	 		 		        	 
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
	 		        	    Log.e("pass 2", "connection success ");
	 		        	}
	 		                catch(Exception e)
	 		        	{
	 		                    Log.e("Fail 2", e.toString());
	 		        	}     
	 		               
	 		        	try
	 		        	{Log.i("ssss","json");

	 		                    JSONObject json_data = new JSONObject(result);
	 		                    String TAG_SUCCESS = "success";
	 		                    String TAG_PRODUCTS = "products";
	 		                    JSONArray products = null;
	 		                    int success = json_data.getInt(TAG_SUCCESS);
	 		                    
	 		                    if (success == 1) {
	 		                        products = json_data.getJSONArray(TAG_PRODUCTS);
	 		                       SmsManager sms = null;
	 		                      int i;
	 		                    for( i=0;i<products.length();i++)
	 		                    {
	 		                        JSONObject json_data1=products.getJSONObject(i);
	 		                        res1[i] = json_data1.getString("num")+json_data1.getString("name")+json_data1.getString("address")+json_data1.getString("flag");
	 		                        
	 		              //          sms = SmsManager.getDefault();
	 		               //     	sms.sendTextMessage("15555215556", null, res1[i], null,null);
	 		                        Log.i("Result",res1[i]);
	 		                        num=json_data1.getString("num");
	 		                       addr=json_data1.getString("address");
	 		                      flag=json_data1.getString("flag");
	 		                     na=json_data1.getString("name");
	 		                    vid=json_data1.getString("vid");
	 		                   uid=json_data1.getString("uid");
			                    
	 		                  Log.i("new reg",na+num+flag);
 		                      
	 		                  
		 		                  if(!num.equals("0"))
		 		                		  {
		 		                
	 		                      
		 		                		  
				                      if(flag.equals("0"))
				                    		  {
				                        send_msg= "Thank you for Registrering "+na+ " with number "+num+" . Your Voter ID is: "+vid+" . Your Unique ID is: "+uid;
				                        sms = SmsManager.getDefault();
				  		                  	sms.sendTextMessage(num, null, send_msg, null,null);
				  		                  	
				  		              
				                    		  }
				                      flag="1111";
		 		                        
		 		                        insert_flag(num,flag);
				                        
		 		                		  }  
	 		                        
	 		                //       Log.i("Result","inserted: "+res1[i]);
	 		                //      Log.i("Result","inserted: "+res1[i]+flag);
	  		                      
	 		                        
	 		                    }
	 		            //       Log.i("SSSS","yes");
	 		                  Log.i("Result","rowwwee: "+i);
	 		                 sms = SmsManager.getDefault();
		                    	
	 		            //      sms.sendTextMessage("15555215556", null, "rows is: "+i+"", null,null);
		                       
	 		                   Log.i("SSSS","no"); 
	 		                    
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
	
	public static void insert_flag(final String num,final String flag)
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
		        	   //    HttpPost httppost = new HttpPost("http://10.0.2.2/votingproject/android_registration_flag.php");
		        	      //  HttpPost httppost = new HttpPost("http://smsvoting.web44.net/votingserver/reg_sms.php");
		        	     //  tnelectioncommission.site40.net
		        	       
		        	       HttpPost httppost = new HttpPost("http://tnelectioncommission.site40.net/android_registration_flag.php");
			        	   
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
		               
		        	try
		        	{Log.i("ssss","json");  
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

		        } catch (Exception ex) {
		            ex.printStackTrace();
		        }
		    }
		}).start();
		
	}


	

}
