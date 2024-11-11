<%-- 
    Document   : visitcounter
    Created on : 11 Nov 2024, 8:52:39?pm
    Author     : Adam
--%>

<%@ page import="java.io.*,java.util.*" %>
<html>
    <head>
        <title>Count visitor</title>
    </head>
    <body>
        <form>
            <fieldset style="width:20%; background-color:#e6ffe6;">
                <legend>Count visitor</legend>
                <%
                    Integer hitsCount =
                    (Integer)application.getAttribute("hitCounter");
                    if( hitsCount ==null || hitsCount == 0 )
                    {
                        /* First visit */
                        out.println("Welcome to my website!!");
                        hitsCount = 1;
                    }
                    else
                    {
                        /* return visit */
                        out.println("Welcome to my website!!");
                        hitsCount += 1;
                    }
                    application.setAttribute("hitCounter", hitsCount);
                %>
                <p>You are visitor number: <%= hitsCount%></p>
            </fieldset>
        </form>
    </body>
</html>
