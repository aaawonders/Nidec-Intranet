from tkinter import *

class Application:
    def __init__(self, master=None):
        pass

def querypg(text):
    print(text)

root = Tk()
Application(root)
texto = Label(root, text='Insira o valor')
texto.grid(column=0, row=0)
codigo = Entry(root, width=100)
codigo.grid(column=0, row=1)
botao = Button(root, text="Rodar código", command=lambda: querypg(codigo.get() + 5))
botao.grid(column=0, row=2)
root.mainloop()

