package com.example.vote;


import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONObject;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.telephony.SmsManager;
import android.telephony.gsm.SmsMessage;
import android.util.Log;
import android.widget.Toast;

import com.example.vote.MainActivity;
 
@SuppressWarnings("deprecation")
public class SmsReceiver extends BroadcastReceiver
{
	String str;
	
	//String id;
	InputStream is=null;
	String result=null;
	String line=null;
	int code;

    @SuppressWarnings("deprecation")
	@Override
    public void onReceive(Context context, Intent intent) 
    {
        //---get the SMS message passed in---
        Bundle bundle = intent.getExtras();        
        SmsMessage[] msgs = null;
         str = "";     
         String ph = null,mess = null;
        if (bundle != null)
        {
            
        	
        	try
        	{
        	//---retrieve the SMS message received---
            Object[] pdus = (Object[]) bundle.get("pdus");
            msgs = new SmsMessage[pdus.length];            
            for (int i=0; i<msgs.length; i++){
                msgs[i] = SmsMessage.createFromPdu((byte[])pdus[i]);                
                str += "SMS from " + msgs[i].getOriginatingAddress();                     
                str += " :";
                str += msgs[i].getMessageBody().toString();
                str += "\n"; 
                Log.i("sms msg",msgs[i].getOriginatingAddress());
                Log.i("sms msg",msgs[i].getMessageBody().toString());
                ph=msgs[i].getOriginatingAddress().toString();
                mess=msgs[i].getMessageBody().toString();
               
                Toast.makeText(context, ph, Toast.LENGTH_SHORT).show();
                Toast.makeText(context, mess, Toast.LENGTH_SHORT).show();
               
                try{
                	 if(mess.substring(0,5).equals("VOTE_"))insert_to_db(ph,mess);
                	Log.i("insert ssss","inserted");
                }
                	catch(Exception e)
                	{
                		Log.i("insert ssss",""+e );
                	}
            }
        	}
        	catch(Exception ee)
        	{
        		Log.i("ee voting exceptinn",""+ee);
        	}
            
            //---display the new SMS message---
           
            Log.i("sms receive",str);
           // Log.i("sms receive",);
            
            Toast.makeText(context, str, Toast.LENGTH_SHORT).show();
            try
            {
            	SmsManager sms = SmsManager.getDefault();
            if(mess.substring(0,5).equals("VOTE_"))
    		{
            	
        		sms.sendTextMessage(ph, null, "Thank for Voting", null,null);
    		}
            else if(!mess.substring(0,5).equals("VOTE_"))
            {
        		sms.sendTextMessage(ph, null, "invalid", null,null);
            	
            }
           
            Toast.makeText(context, "msg sent to"+ph, Toast.LENGTH_SHORT).show();
            }
            catch(Exception e)
            {
            	Log.e("voting exceptinn",""+e);
            	
            }
       
            
        }                         
    }
    
    public void insert_to_db(final String num,final String text)
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
		           	nameValuePairs.add(new BasicNameValuePair("text",text));
		           	
		           	
		            	try
		            	{Log.i("ssss","http");
		            	Log.i("ssss value",num);
		            	Log.i("ssss value",text);
		        		
		            		//http://10.0.2.2/votingfinal/inccc.php
		            	//http://localhost/votingfinal/reg_sms.php
		        		HttpClient httpclient = new DefaultHttpClient();
		        		//smsvoting.web44.net/votingserver
		        		//
		        		//HttpPost httppost = new HttpPost("http://10.0.2.2/votingfinal/android_msg_to_db.php");
		        		
		        	//	tnelectioncommission.site40.net
		        		HttpPost httppost = new HttpPost("http://tnelectioncommission.site40.net/android_msg_to_db.php");
		        		
		        		
		        	//HttpPost httppost = new HttpPost("http://10.0.2.2/votingfinal/and_msg.php");
			        	
		        		//	HttpPost httppost = new HttpPost("http://smsvoting.web44.net/votingserver/android_msg_to_db.php");
		        	    
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

		        } catch (Exception ex) {
		            ex.printStackTrace();
		        }
		    }
		}).start();
		
	}
    
}