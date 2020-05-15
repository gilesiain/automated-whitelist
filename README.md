# automated-whitelist
whitelist automation in the browser for arma/dayz servers

WHY?
I used to be part of a few ARMA(Pc game) communities, a lot of these communities ran their own game servers and most of them where white listed, meaning if you wanted on the server you had to read and understand the server rules, you would then have some what of an interview with a server admin to verify you where going to follow said rules and not be a complete menace on the server or to other players. These interviews consisted of an admin briefly asking a few questions about the server rules and if you answered correctly then you'd get whitelisted, so I thought, why not automate this and free up admin time for other things like server maintenance etc.

HOW?
Client enters steam username.
Using javascript (ajax), username gets passed to php, where the data(steamid,name,profile image) is grabbed using xml, the steamid64 is encoded to battle-eye anti cheat guid first then all data is passed back as an array to javascript via json.
Once a profile has been found/verified, the user is then asked randomly generated questions (with time limit) about the server rules, meaning if they got the questions wrong and tried again it would be completely different questions each time(no cheating),(not randomly generated or time based in project example).
Lastly if the test is passed, then the guid(anti cheat user id) retrieved earlier would then be passed from javascript variable to php(ajax), using php a .txt file is appended with said guid, once it has been appended a copy of this file is sent to the game server via ftp(ftp_put).
TOOLS USED
