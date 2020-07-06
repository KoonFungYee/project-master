import 'dart:convert';

import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'cooker.dart';
import 'customerlist.dart';
import 'package:http/http.dart' as http;

class Customerdetail extends StatefulWidget {
  final String phone;
  final String custName;
  final String custPhone;
  Customerdetail({Key key, this.phone, this.custName, this.custPhone}) : super(key: key);

  @override
  _CustomerdetailState createState() => _CustomerdetailState();
}

class _CustomerdetailState extends State<Customerdetail> {
  String getDataURL = "http://192.168.43.245/fyp/getCustData.php";
  String startdate, person, day;

  @override
  void initState() {
    startdate = person = day = "";
    getData();
    super.initState();
  }

  void getData() {
    http.post(getDataURL, body: {
      "phone": widget.phone,
      "custphone": widget.custPhone,
    }).then((res) {
      var list = json.decode(res.body);
      setState(() {
        startdate = list[0];
        person = list[1];
        day = list[2];
      });
    });
  }

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: Scaffold(
        backgroundColor: Colors.white,
        appBar: PreferredSize(
          preferredSize: Size.fromHeight(150),
          child: AppBar(
            leading: IconButton(
              color: Colors.white,
              icon: Icon(Icons.arrow_back_ios, size: 20),
              onPressed: _onBackPressAppBar,
            ),
            backgroundColor: Color.fromRGBO(0, 0, 205, 0.5),
            elevation: 1,
            centerTitle: true,
            title: Container(
              child: Text(
                "Cooker detail",
                style: TextStyle(
                    color: Colors.white,
                    fontSize: 20,
                    fontWeight: FontWeight.bold),
              ),
            ),
          ),
        ),
        body: Column(
            mainAxisAlignment: MainAxisAlignment.start,
            children: <Widget>[
              SizedBox(
                height: 30,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.start,
                children: <Widget>[
                  SizedBox(
                    width: 20,
                  ),
                  Text(
                    "Start From",
                    style: TextStyle(
                        fontSize: 20,
                        color: Colors.black,
                        fontWeight: FontWeight.normal),
                  ),
                ],
              ),
              SizedBox(
                height: 10,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.start,
                children: <Widget>[
                  SizedBox(
                    width: 20,
                  ),
                  Text(
                    startdate,
                    style: TextStyle(
                        fontSize: 20,
                        color: Colors.grey,
                        fontWeight: FontWeight.normal),
                  ),
                ],
              ),
              SizedBox(
                height: 40,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.start,
                children: <Widget>[
                  SizedBox(
                    width: 20,
                  ),
                  Text(
                    "Person",
                    style: TextStyle(
                        fontSize: 20,
                        color: Colors.black,
                        fontWeight: FontWeight.normal),
                  ),
                ],
              ),
              SizedBox(
                height: 10,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.start,
                children: <Widget>[
                  SizedBox(
                    width: 20,
                  ),
                  Text(
                    person,
                    style: TextStyle(
                        fontSize: 20,
                        color: Colors.grey,
                        fontWeight: FontWeight.normal),
                  ),
                ],
              ),
              SizedBox(
                height: 40,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.start,
                children: <Widget>[
                  SizedBox(
                    width: 20,
                  ),
                  Text(
                    "Day",
                    style: TextStyle(
                        fontSize: 20,
                        color: Colors.black,
                        fontWeight: FontWeight.normal),
                  ),
                ],
              ),
              SizedBox(
                height: 10,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.start,
                children: <Widget>[
                  SizedBox(
                    width: 20,
                  ),
                  Text(
                    day,
                    style: TextStyle(
                        fontSize: 20,
                        color: Colors.grey,
                        fontWeight: FontWeight.normal),
                  ),
                ],
              ),
              // SizedBox(
              //   height: 230,
              // ),
              // Column(
              //   mainAxisAlignment: MainAxisAlignment.end,
              //   children: <Widget>[
              //     MaterialButton(
              //       shape: RoundedRectangleBorder(
              //           borderRadius: BorderRadius.circular(20.0)),
              //       minWidth: double.infinity,
              //       height: 50,
              //       child: Text(
              //         'Cancel',
              //         style: TextStyle(fontSize: 25, color: Colors.white),
              //       ),
              //       color: Colors.blueAccent,
              //       textColor: Colors.white,
              //       onPressed: _submitDialogShow,
              //     ),
              //   ],
              // ),
            ]),
      ),
    );
  }

  void _submitDialogShow() async {
    await showDialog(
      context: context,
      builder: (BuildContext context) {
        return CupertinoAlertDialog(
          title: Text("Cancel Successful"),
          content: Text("Your cooker canceled."),
          actions: <Widget>[
            FlatButton(
                onPressed: () {
                  Navigator.pushReplacement(
                      context,
                      MaterialPageRoute(
                        builder: (context) => Cooker(),
                      ));
                },
                child: Text("Done"))
          ],
        );
      },
    );
  }

  void _onBackPressAppBar() {
    Navigator.pushReplacement(
        context,
        MaterialPageRoute(
          builder: (context) => Customerlist(phone: widget.phone,),
        ));
  }
}
