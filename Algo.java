import java.util.Stack;

class Algo{
    public static void main(String [] args){
        Stack<Integer> pila = new Stack<>();

        System.out.println("Pila vacia: "+pila);
        System.out.println("Esta vacia?: "+pila.isEmpty());

        for (int i = 1; i < 6; i++) {
            pila.push(i);
        }

        for(Integer val : pila){
            System.out.println(val);
        }

        pila.pop();

        System.out.println("Valor de hasta arriba: "+pila.peek());
        
    }
}