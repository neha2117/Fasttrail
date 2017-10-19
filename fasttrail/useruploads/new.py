import cv2
import numpy as np
import os

face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
eye_cascade = cv2.CascadeClassifier('haarcascade_eye.xml')
while 1:  
    for file in os.listdir("C:/xampp/htdocs/fasttry/useruploads/img/"):
        print("\\img\\"+file)
        img = cv2.imread("C:/xampp/htdocs/fasttry/useruploads/img/"+file)
        #gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
        faces = face_cascade.detectMultiScale(img, 1.3, 5)
        if len(faces)!=0:
            for (x,y,w,h) in faces:
                s_img = cv2.imread("dress.png")
                l_img = img
                x_onset = 5*w/s_img.shape[0]
                y_onset = 4.5*h/s_img.shape[1]
                x_offset = int(x - x_onset*150)
                y_offset = y + h - int(h/3.8)
                if x_offset<=0:
                    xcut=abs(x_offset)
                    x_offset=0
                else:
                    xcut=0
                s_img = cv2.resize(s_img,(0,0),fx=x_onset,fy=y_onset)
                crop=s_img[0:l_img.shape[0]-y_offset,xcut:l_img.shape[1]-x_offset]
                #l_img[y_offset:y_offset+crop.shape[0], x_offset:x_offset+crop.shape[1]] = crop
                for c in range(0,3):
                    l_img[y_offset:y_offset+crop.shape[0], x_offset:x_offset+crop.shape[1], c] = crop[:,:,c] * (crop[:,:,2]/255.0) +  l_img[y_offset:y_offset+crop.shape[0], x_offset:x_offset+crop.shape[1], c] * (1.0 - crop[:,:,2]/255.0)
            cv2.imwrite("C:/xampp/htdocs/fasttry/useruploads/conv/"+file,l_img)
        else:
            cv2.imwrite("C:/xampp/htdocs/fasttry/useruploads/conv/"+file,img)