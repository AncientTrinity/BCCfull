

--ticket info
SELECT T.ticketid, UI.fname,S.seattype,LS.location,L.location,BS.busdepart,BS.cost
From ticket T 
JOIN busschedule as BS 
ON BS.busscheid = T.busscheid 
JOIN locationofstop AS LS 
ON BS.begin_locationid = LS.stoplocid 
JOIN locationofstop AS L
ON BS.end_locationid = L.stoplocid 
JOIN seat AS S ON T.seatid = S.seatid 
JOIN userinfo as UI 
ON T.userid = UI.userid 
WHERE UI.userid = 1;


--payment history

SELECT S.seatname,LS.location,L.location,BS.busarrival,BC.buscompname,B.busnumber,BS.cost
From ticket T 
JOIN busschedule as BS 
ON BS.busscheid = T.busscheid 
JOIN bus as B
ON BS.busid = B.busid
JOIN buscompanies as BC
ON B.buscompid = BC.buscompid
JOIN locationofstop AS LS 
ON BS.begin_locationid = LS.stoplocid 
JOIN locationofstop AS L
ON BS.end_locationid = L.stoplocid 
JOIN seat AS S ON T.seatid = S.seatid 
JOIN userinfo as UI 
ON T.userid = UI.userid 

WHERE UI.fname = 'victor';






