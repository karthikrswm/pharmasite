#!c:\wamp\bin\perl\bin\perl.exe
use DBI;
use CGI':standard';

print "content-type:text/html\n\n";

my $username=param("username");
my $product_name=param("product_name");
my $reviews=param("reviews");

my $dbh = DBI->connect("DBI:mysql:medical_store", "root", "mysqlpass") or die "Error -- unable to open database";
my $sth=$dbh->prepare("INSERT INTO reviews (username,product_name,comments) VALUES (\"$username\",\"$product_name\",\"$reviews\")");

$sth->execute();
$sth->finish();

print "<html>";
print "<head>
		<title>Thank You</title>
		<link href=\"css/ex_ss.css\" type=\"text/css\" rel=\"stylesheet\" />
		<link rel=\"shortcut icon\" href=\"images/ps-icon.png\" type=\"image/type here\" />
		</head>";
print "<body align=\"center\">";
print "<br><p style=\"font-family:Segoe UI Light;font-size:3em;\">Thank you for your kind feedback <br>Feedback sent successfully</p><br><br>";
print "<a href=\"index.php\" class=\"button1\">Continue Shopping</a>";
print "</html></body>";