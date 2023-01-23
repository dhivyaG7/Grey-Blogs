from flask import Flask, render_template,request
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI']='postgresql://postgres:Abitha672003@localhost/Blogs'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db=SQLAlchemy(app)
app.app_context().push()

class Blogs(db.Model):
  __tablename__='post'
  user_id=db.Column(db.bigint,primary_key=True)
  title=db.Column(db.varchar(50))
  tag=db.Column(db.varchar(100))
  content=db.Column(db.varchar(1000))

  def __init__(self,user_id,title,tag,content):
    self.user_id=user_id
    self.title=title
    self.tag=tag
    self.content=content


@app.route('/')
def index():
  return render_template('blogs.html')

@app.route('/submit', methods=['GET','POST'])
def submit():
  user_id= request.form['user_id']
  title=request.form['title']
  tag=request.form['tag']
  content=request.form['content']

  grey=Blogs(user_id,title,tag,content)
  db.session.add(grey)
  db.session.commit()


  greyResult=db.session.query(Blogs).filter(Blogs.tag==1)
  for result in greyResult:
    print(result.user_id)

  return render_template('blogs.html', data=user_id)


if __name__ == '__main__':
  app.run(debug=True)
