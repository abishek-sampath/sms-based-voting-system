package com.example.vote;

import static com.example.vote.NewRegistrationWeb.myTimer;
import static com.example.vote.SendRegionCidWeb.myTimerRegion;
import static com.example.vote.SendFormatVotersWeb.myTimerformat;


import java.io.InputStream;

import com.example.vote.R;

import android.support.v7.app.ActionBarActivity;
import android.graphics.Color;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.ToggleButton;

public class MainActivity extends ActionBarActivity {
	
	static TextView messageBox;
	InputStream is=null;
	String result=null;
	String line=null;
	String res1[] = new String[100];
	
	
	String name;
	String id;
//	InputStream is=null;
//	String result=null;
//	String line=null;
	int code;
	
	String num,addr,flag,vid,na,uid;
	String send_msg;

	int region_i=0;
	int new_reg_i=0;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		 Log.i("ssss","started");
		 Toast.makeText(getApplicationContext(), "20 MAR serverstarted", Toast.LENGTH_LONG).show();
			
		   Log.i("ssss","started");

	}
	
	
	public void send_region_cid(View view)
	{
		Button b4= (Button) findViewById(R.id.button4);
		b4.setBackgroundColor(Color.MAGENTA);
		
		Toast.makeText(getApplicationContext(), "SEND REGOIN CID", Toast.LENGTH_LONG).show();
		             
		//com.example.vote.SendRegionCid.send_region_cid();
		new com.example.vote.SendRegionCidWeb();
		
			
	}
	public void new_registration_check(View view)
	{
		Button b5= (Button) findViewById(R.id.button5);
		b5.setBackgroundColor(Color.YELLOW);
		
		Toast.makeText(getApplicationContext(), "NEW REGISTRATION", Toast.LENGTH_LONG).show();
		             
	//	com.example.vote.NewRegistrationCheck.new_registration_check();
		new com.example.vote.NewRegistrationWeb();
		
		
			
	}
	
	public void send_format_voters(View view)
	{
		Button b6= (Button) findViewById(R.id.button6);
		b6.setBackgroundColor(Color.RED);
		
		Toast.makeText(getApplicationContext(), "SENT FORMAT", Toast.LENGTH_LONG).show();
		             
		//com.example.vote.SendFormatVoters.send_format(); 
		new com.example.vote.SendFormatVotersWeb(); 
		
			
	}
	
	public void toggle_new_registration(View view)
	{
		ToggleButton tb= (ToggleButton) findViewById(R.id.toggleButton1);
		TextView t6= (TextView)findViewById(R.id.textView6);		
		
		String t=tb.getText().toString();
		Log.i("sss",t);
		
		
		
		if(t.equals("OFF"))
				{
			new com.example.vote.NewRegistrationWeb(); 
			t6.setText("REGISTRAION TIMER RUNNING");
			
				}
		if(t.equals("ON"))
				{
			myTimer.cancel();
			t6.setText("REGISTRAION TIMER STOPPED");
			
			Log.i("vote stat","timer stopper");
			
				}
		
		
			
	}
	public void toggle_region_cid(View view)
	{
		ToggleButton tb= (ToggleButton) findViewById(R.id.toggleButton2);
		
		TextView t5= (TextView)findViewById(R.id.textView5);		
		String t=tb.getText().toString();
		
		Log.i("sss",t);
		Log.i("sss",""+region_i);
		
		if(t.equals("OFF"))
				{
			new com.example.vote.SendRegionCidWeb(); 
			
			t5.setText("REGION TIMER RUNNING");
			
				}
		if(t.equals("ON"))
				{
			myTimerRegion.cancel();
			t5.setText("REGION TIMER STOPPED");
			Log.i("vote stat","region timer stopper");
			
				}
			
	}
	
	public void toggle_format(View view)
	{
		ToggleButton tb= (ToggleButton) findViewById(R.id.toggleButton3);
		TextView t7= (TextView)findViewById(R.id.textView7);		
		
		String t=tb.getText().toString();
		
		Log.i("sss",t);
	//	Log.i("sss",""+region_i);
		
		if(t.equals("OFF"))
				{
			new com.example.vote.SendFormatVotersWeb(); 
			t7.setText("FORMAT TIMER RUNNING");
			
				}
		if(t.equals("ON"))
				{
			myTimerformat.cancel();
			t7.setText("FORMAT TIMER STOPPED");
			
			Log.i("vote stat","format timer stopper");
			
				}
			
	}


	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// Handle action bar item clicks here. The action bar will
		// automatically handle clicks on the Home/Up button, so long
		// as you specify a parent activity in AndroidManifest.xml.
		int id = item.getItemId();
		if (id == R.id.action_settings) {
			return true;
		}
		return super.onOptionsItemSelected(item);
	}
}
