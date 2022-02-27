import cv2
import pymysql.cursors
from face_recognition.api import face_encodings
from simple_facerec import SimpleFacerec

connection = pymysql.connect(host='localhost',user='root',password='',db='bilmuhuyg',charset='utf8', cursorclass=pymysql.cursors.DictCursor)
cur = connection.cursor()

sfr = SimpleFacerec()
sfr.load_encoding_images("upload")
#load camera
cap = cv2.VideoCapture(0)
org = (250, 50)
fontScale = 1
color = (0, 255, 0)
thickness = 2
font = cv2.FONT_HERSHEY_SIMPLEX

while True:
    ret, frame = cap.read()
    face_locations, faces_names = sfr.detect_known_faces(frame)
    for face_loc, name in zip(face_locations, faces_names):
        if name == "Bilinmiyor":
            y1,x2,y2,x1 = face_loc[0], face_loc[1], face_loc[2], face_loc[3]

            cv2.putText(frame,"Bilinmiyor",(x1,y1 - 10),cv2.FONT_HERSHEY_DUPLEX,1,(0,0,200),2)
            cv2.rectangle(frame,(x1,y1),(x2,y2),(0,0,200),4)
            
        else:
            y1,x2,y2,x1 = face_loc[0], face_loc[1], face_loc[2], face_loc[3]

            cv2.putText(frame,name,(x1,y1 - 10),cv2.FONT_HERSHEY_DUPLEX,1,(0,255,0),2)
            cv2.putText(frame, 'Hosgeldiniz', org, font, fontScale, color, thickness, cv2.LINE_AA)
            cv2.rectangle(frame,(x1,y1),(x2,y2),(0,255,0),4)
            
            sql = """insert into `giris` (giris_durumu,name) values (%s,%s)"""
            cur.execute(sql,('enabled',name))
            connection.commit()
    
    cv2.imshow("Frame",frame)
    
    key = cv2.waitKey(1)
    if key == 27:
        break

cap.release()
cv2.destroyAllWindows()