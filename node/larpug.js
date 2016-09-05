
/**
 * local pug delivery via localhost web port 4200
 */

var fs = require("fs");
var pug = require("pug");
var http = require("http");
var path = require("path");

http.createServer(function(req, res) {

  if (req.method !== "POST") {
    res.writeHead(500, {"Content-Type": "text/json"});
    res.end(JSON.stringify({"error": "post required"}));
    return true;
  }

  var body = "";

  req.on("data", function(data) {
    body += data;
  });

  req.on("end", function() {

    var post = JSON.parse(body);

    if (post.module == "pug") {

      pug.renderFile(post.options.file, post.data, function(error, output) {
        if (error) {
          res.writeHead(500, {"Content-Type": "text/html"});
          res.end(error.message); 
        } else {
          res.writeHead(200, {"Content-Type": "text/html"});
          res.end(output);
        }
      });

    }

  });

}).listen(4242);
