import smtplib
import sys

def sendEmail(sender,password,receiver,message):
    server = smtplib.SMTP("smtp.gmail.com",587)

    try:
        server.starttls()
        server.login(sender,password)
        server.sendmail(sender,receiver,message)
        print("1")
    except(smtplib.SMTPException):
        print("0")



def main():

    subject = sys.argv[1]
    body = sys.argv[2]
    msg = f'Subject: {subject}\n\n{body}'


    sendEmail("galindosplan@gmail.com","galindo@super1","galindosplan@gmail.com",msg)



if __name__ == "__main__":
    main()
