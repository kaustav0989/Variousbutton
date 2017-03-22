package com.example.kaustav.variousbutton;

import android.content.Intent;
import android.net.Uri;
import android.provider.Settings;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {

    Button dial,sms,email,settings;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        dial=(Button)findViewById(R.id.dial);
        sms=(Button)findViewById(R.id.sms);
        email=(Button)findViewById(R.id.email);
        settings=(Button)findViewById(R.id.settings);

        dial.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {

                Intent d=new Intent(Intent.ACTION_DIAL);
                startActivity(d);
            }
        });
        sms.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {

                Uri uri=Uri.parse("smsto"+"7797480989");
                Intent s=new Intent(Intent.ACTION_SENDTO,uri);
                s.putExtra("sms_body","Sample");
                startActivity(s);
            }
        });
        email.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {

                Intent e=new Intent(Intent.ACTION_SEND);
                e.putExtra(Intent.EXTRA_EMAIL,new String[]{"roni0989@gmail.com"});
                e.putExtra(Intent.EXTRA_SUBJECT,"sample mail");
                e.putExtra(Intent.EXTRA_TEXT,"Sample mail Content");
                e.setType("message/rfc822");
                startActivity(Intent.createChooser(e,"Select an email content"));
            }
        });
        settings.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {

                startActivity(new Intent(Settings.ACTION_SETTINGS));
            }
        });
    }
}
